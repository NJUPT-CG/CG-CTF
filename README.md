# CG-CTF
A Simple CTF Practice &amp; Competition Platform


访问 /IN1t4dmin_Cg_c7f_X1c_+1s 可新增管理员, confirm code 为env中填写的 ADMIN_CODE 值

安装CGCTF前,确保服务器上已装好 apache/nginx mysql php5.0+(推荐7.0+) composer node.js npm 

另外 因为node版本过高的时候 node-sass会不支持,建议node版本为7.x

并确保php的一些扩展模块也已被安装//反正装的时候 缺啥装啥。。。。

克隆到本地之后

composer install --ignore-platform-reqs

composer update

修改 .env.example 中的内容

APP_URL 必填,为网站url 

DB_     必填,按照自己服务器上的配置填写

MAIL_   用于发送重置密码的邮件，如果不填，则无法重置密码

ADMIN_CODE 用于创建管理员的密码

并保存为.env

执行 php artisan key:generate

执行 php artisan migrate

### 前端

需要安装依赖，嫌太慢可以挂梯子，或者用cnpm、yarn

```
npm install
```


之后同步前端的样式需要运行
```
npm run dev
```

