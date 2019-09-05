# Welcome to CGCTF 👋
![Version](https://img.shields.io/badge/version-1.0.0-blue.svg?cacheSeconds=2592000)
[![Documentation](https://img.shields.io/badge/documentation-yes-brightgreen.svg)](https://github.com/CGCTF/CGCTF/new/master)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://github.com/kefranabg/readme-md-generator/graphs/commit-activity)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/kefranabg/readme-md-generator/blob/master/LICENSE)

[![Twitter: meizjm3i](https://img.shields.io/twitter/follow/meizjm3i.svg?style=social)](https://twitter.com/meizjm3i)

> A open source CTF platform.

### Homepage🏠

[https://cgctf.nuptsast.com/](https://cgctf.nuptsast.com/)

## Deploy

## Backend

访问 /IN1t4dmin_Cg_c7f_X1c_+1s 可新增管理员, confirm code 为env中填写的 ADMIN_CODE 值

安装CGCTF前,确保服务器上已装好 apache/nginx mysql php5.0+(推荐7.0+) composer node.js npm 

另外 因为node版本过高的时候 node-sass会不支持,建议node版本为7.x

并确保php的一些扩展模块也已被安装//反正装的时候 缺啥装啥。。。。

要注意web根目录在 CG-CTF/CG-CTF/public, 保证CG-CTF 根目录下的文件 (特别是 .env) 不能被访问到

克隆到本地之后

composer install --ignore-platform-reqs

composer update

修改 .env.example 中的内容

APP_URL 必填,为网站url 

DB_     必填,按照自己服务器上数据库的配置填写

MAIL_   用于发送重置密码的邮件，如果不填，则无法重置密码

ADMIN_CODE 用于创建管理员的密码,（创建完毕可以删除该值，也可以将routes/web.php中 'IN1t4dmin_Cg_c7f_X1c_+1s' 路由注释掉 ）

并保存为.env

在 CG-CTF/CG-CTF 目录下:

执行 php artisan key:generate 

执行 php artisan migrate  

这两条命令第一条用于创建该项目的Key,用于加密，第二条用于迁移数据库，会在数据库中创建平台所需要的表

### FrontEnd

需要安装依赖，嫌太慢可以挂梯子，或者用cnpm、yarn

```
npm install
```

之后同步前端的样式需要运行
```
npm run dev
```

## Author

- homura

[![-w70](https://avatars1.githubusercontent.com/u/23479846?s=400&v=4)](https://github.com/wjbsyc)

- meizjm3i

[![-w70](https://avatars2.githubusercontent.com/u/21093155?s=400&u=1ddbe1426304ad37bc0af2514ceac46c8ca783bb&v=4)](https://github.com/meizjm3i)

- acdxvfsvd

[![-w70](https://avatars2.githubusercontent.com/u/23629203?s=400&v=4)](https://github.com/acdxvfsvd)

- GooeyNyan

[![-w70](https://avatars0.githubusercontent.com/u/16070774?s=400&v=4)](https://github.com/GooeyNyan)



## 🤝 Contributing

Contributions, issues and feature requests are welcome!

Feel free to check [issues page](https://github.com/CGCTF/CGCTF/issues).

## Show your support

Give a ⭐️ if this project helped you!












