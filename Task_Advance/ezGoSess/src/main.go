package main

import (
	_ "embed"
	"fmt"
	"html/template"
	"net/http"
	"os"
	"strings"

	"github.com/gin-contrib/sessions"
	"github.com/gin-contrib/sessions/cookie"
	"github.com/gin-gonic/gin"
)

//go:embed template/index.html
var tpl_index string

//go:embed template/login.html
var tpl_login string

type TemplateData struct {
	Links []string
}

func main() {
	port := os.Getenv("PORT")
	if port == "" {
		port = "80"
	}
	r := gin.Default()
	sec0d3 := "s3cr3t_c0de-randomStr"
	store := cookie.NewStore([]byte(sec0d3))
	r.Use(sessions.Sessions("mygosess", store))

	r.GET("/", func(c *gin.Context) {
		data := TemplateData{
			Links: []string{
				"login",
				"logout",
				"flag",
			},
		}

		t, err := template.New("index").Parse(tpl_index)
		if err != nil {
			fmt.Println(err)
			c.String(500, "internal error")
			return
		}

		err = t.Execute(c.Writer, data)
		if err != nil {
			http.Error(c.Writer, err.Error(), http.StatusInternalServerError)
		}

	})

	// 登录路由
	r.GET("/login", func(c *gin.Context) {
		session := sessions.Default(c)
		var uname string
		if session.Get("username") == nil {
			uname = "anonymous"
		} else {
			uname = session.Get("username").(string)
		}
		t, err := template.New("index").Parse(strings.ReplaceAll(tpl_login, "{{uname}}", uname))
		if err != nil {
			fmt.Println(err)
			c.String(500, "internal error")
			return
		}
		t.Execute(c.Writer, nil)
	})

	r.POST("/login", func(c *gin.Context) {
		username := c.PostForm("username")
		if username == "admin" {
			c.String(http.StatusForbidden, "Access denied, only admin can do!")
			return
		}

		session := sessions.Default(c)
		session.Set("username", username)
		session.Save()

		c.String(http.StatusOK, "Hello, "+username+"! May be you can use this secret key to pretend admin: "+sec0d3)
	})

	// 登出路由
	r.GET("/logout", func(c *gin.Context) {
		session := sessions.Default(c)
		session.Delete("username")
		session.Save()
		c.String(http.StatusOK, "Logged out")
	})

	// 读flag
	r.GET("/flag", func(c *gin.Context) {
		session := sessions.Default(c)
		username := session.Get("username")
		if username == "admin" {
			content, err := os.ReadFile("/fl4g")
			if err != nil {
				c.String(http.StatusInternalServerError, "File read error")
				return
			}
			notice := "hello admin, this your flag: " + string(content)
			c.String(http.StatusOK, notice)
		} else {
			c.String(http.StatusOK, "No! You are not admin, only admin can read flag!")
		}
	})

	r.Run(fmt.Sprintf(":%s", port))
}
