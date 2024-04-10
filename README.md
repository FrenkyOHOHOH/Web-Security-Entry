# Web-Security-Entry

Web安全入门靶场，此项目为靶机源码，欢迎交流学习，欢迎补充write up。

本靶场分三部分，分别是前置知识、基础知识和进阶知识，但这些题目在CTF中都算是简单题，并且涵盖了大部分需要学习的知识点，比较适合初学者入门。同时所有镜像都打包了push到了dockerhub上，只要有docker环境就可以pull下来进行学习，dockerhub上的所有镜像都已经适配了[ctfd-whale](https://github.com/FrenkyOHOHOH/ctfd-whale)动态靶机，配合[CTFd](https://github.com/FrenkyOHOHOH/CTFd-fr3nky)使用最佳。

下面介绍题目框架：

## 前置

| 题目名称    | dockerhub镜像          | 知识点                                                       |
| ----------- | ---------------------- | ------------------------------------------------------------ |
| HTTP        | fr3nky/pre-http:v0     | 请求方法： GET、POST等；报文头：Cookie，Referer，X-Forwarded-For等； |
| 302Redirect | fr3nky/pre-302:v0      | HTTP状态码                                                   |
| 前端绕过    | fr3nky/pre-jsbypass:v0 | JS绕过，input标签绕过                                        |
| 信息泄露    | fr3nky/pre-infoleak:v0 | F12源码注释泄露，src.tar.gz源码备份泄露，git泄露             |

## 基础

| 题目名称      | dockerhub镜像              | 知识点                                                  |
| ------------- | -------------------------- | ------------------------------------------------------- |
| sqli-labs     | fr3nky/base-sql:v1         | sqli-labs练习靶场https://github.com/Audi-1/sqli-labs    |
| upload-labs   | fr3nky/base-upload:v0      | upload-labs练习靶场https://github.com/c0ny1/upload-labs |
| 简单的SQL注入 | fr3nky/base-ezsql:v0       | sql注入，过滤了一些符号，考察绕过方式                   |
| PHP语言特性   | fr3nky/base-php-feature:v0 | 考察PHP语言特性引起的安全问题                           |
| EasyRCE       | fr3nky/base-ezrce:v0       | PHP代码执行的函数                                       |
| ez_ssti       | fr3nky/base-ssti:v1        | ssti漏洞发现与利用                                      |
| 溢！出！      | fr3nky/base-overflow:v0    | PHP语言的特性，继承了c语言int，long的范围               |
| 简单的编程题  | fr3nky/base-coding:v0      | 考察代码编写能力以及python的利用                        |
| 密码爆破      | fr3nky/base-burtepwd:v0    | 密码本爆破，burpsuite的intruder模块使用                 |
| 文件包含      | fr3nky/base-include:v0     | 伪协议                                                  |
| ezXXE         | fr3nky/base-xxe:v0         | XML注入                                                 |
| XSS练习       | fr3nky/base-xsslab:v0      | XSS练习https://github.com/do0dl3/xss-labs               |

## 进阶

| 题目名称           | dockerhub镜像               | 知识点                                                 |
| ------------------ | --------------------------- | ------------------------------------------------------ |
| PHP反序列化初识    | fr3nky/adv-ezunser:v0       | PHP反序列化                                            |
| Pickle反序列化初识 | fr3nky/adv-pickle:v2        | 任意文件读取，flask session伪造，python pickle反序列化 |
| suid提权           | fr3nky/adv-suid:v0          | rce，suid读文件                                        |
| goSession伪造      | fr3nky/adv-gosess:v1        | gin session伪造                                        |
| 简单的绕过         | fr3nky/adv-bypassdisfunc:v0 | disable_function绕过读文件                             |



