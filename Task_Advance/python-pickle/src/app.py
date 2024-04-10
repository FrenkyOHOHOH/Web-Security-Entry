import pickle
import base64
from flask import Flask, request, session
from flask import render_template,redirect,send_from_directory
import os
import random
from flask import send_file

app = Flask(__name__)
app.config['SECRET_KEY'] = "Y0V-WI11_n3U3r-k0NVV_Th3-F145K_53cr3T_k3y!@#$%^"
app.config['SESSION_COOKIE_NAME'] = "S3SS10N"


class User():
    def __init__(self,name,age):
        self.name = name
        self.age = age

def check(s):
    if b'R' in s:
        return 0
    return 1

@app.route("/")
def index():
    username="CTFer"
    try:
        if session['username'] == "admin" :
            username="admin"
            if request.headers.get('Data')==None:
                data = "雪豹闭嘴"
            else:
                data = base64.b64decode(request.headers.get('Data'))
                if check(data):
                    print(pickle.loads(data))
                    data = pickle.loads(data)
                else:
                    data = "bad,bad,hacker"
        else:
            username = session['username']
            data = "you are not admin now!!!"
    except:
        data=''
        session['username'] = "CTFer"
            
    try:
        pic=request.args.get('pic')
        with open(pic, 'rb') as f:
            base64_data = base64.b64encode(f.read())
            p = base64_data.decode()
    except:
        pic='{0}.jpg'.format(random.randint(1,4))
        with open(pic, 'rb') as f:
            base64_data = base64.b64encode(f.read())
            p = base64_data.decode()

    return render_template('index.html', uname=username, pic=p, data=data)


if __name__ == "__main__":
    app.run('0.0.0.0',port=80)