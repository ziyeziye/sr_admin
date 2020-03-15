### 使用说明  
`js目录为管理系统前端源代码`  

1.还原数据库  
暂无数据库迁移文件  
使用navicat数据库管理工具创建数据库,然后用database/navicat_sqlbak.nb3
来还原数据库备份  
`#后期会补齐laravel数据库迁移文件`

2.启动项目  
先初始化项目  
`composer install`  
然后到js目录  
`npm install` 
 
启动php服务  
`php artisan serve`  
启动前端程序(切换到js目录)  
```
#修改js/static/config/index.js
baseUrl配置为后端接口域名(端口)

npm run dev
```

3.编译前端代码
```
npm run build
修改js/dist/config/index.js
baseUrl配置为服务后端接口域名(端口)
将js/dist 目录下的代码放到服务器指定地址
```
