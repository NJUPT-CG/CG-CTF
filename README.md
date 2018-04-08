# CG-CTF
A Simple CTF Practice &amp; Competition Platform

因为vendor下的东西好像跟本地环境有关,所以不能直接克隆下来使用
请在本地用composer install

访问 "/test" 来生成100个测试用户

访问 "/createChallenges" 来生成100个测试用题, flag 是 1

访问 /IN1t4dmin_Cg_c7f_X1c_+1s 可新增管理员, confirm code 为env中填写的 ADMIN_CODE 值

### 前端

需要安装依赖，嫌太慢可以挂梯子，或者用cnpm、yarn
```
npm install
```

之后同步前端的样式需要运行
```
npm run dev
```