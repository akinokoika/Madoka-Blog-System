# Madoka-Blog-System

一个基于mdui的博客系统，拥有基本的论坛功能

### 介绍

- 开发的运行环境：xampp
- 测试的运行环境：localhost，cpanel虚拟主机
- 开源框架：[mdui](https://github.com/zdhxiong/mdui)
- 语言：html5，js，php，mysql
- 兼容：Ie10+，Chrome，Edge，Safari，Firefox
- 响应：iPhone X，iPad

### 基本功能

- 登录，注册，注销，游客
- 响应式设计
- 侧边栏
- 查看，添加，修改，删除，搜索文章
- 查看，添加，删除评论
- 查看，设置个人信息
- 查看相册，上传图片
- 关注，搜索用户
- 等级，经验，积分
- 修改密码

### 更多功能

- 验证码
- 日历签到
- 最新文章与用户
- 特殊主题的背景，侧边栏，图标，卡片
- 视频与音乐
- 商城购买主题
- 公告与发送私信

### 国际化

- 中英文网站首页

### 无障碍

- 验证码语音

### 安装指南

将Madoka Blog System里的文件移动至网站主目录，使用datebase里的madoka_blog_system.sql创建数据库，修改config.php文件
```php
// config.php
<?php
$servername = "";               // 服务器名称，通常是localhost
$username = "";                 // 数据库用户名
$password = "";                 // 数据库密码
$dbname = "madoka_blog_system"; // 数据库名称，默认是madoka_blog_system
?>
```

### 目录结构

```
Madoka Blog System/
├── index.php                   // 主页面，博客首页
├── config.php                  // 数据库配置文件
├── video.html                  // 次页面，视频
├── shopping.html               // 商城
├── info.php                    // 个人信息
├── message.php                 // 消息
├── upload.php                  // 上传处理
├── mdui/                       // 框架文件
│   └── ...
├── base/                       // 基本功能
│   ├── login.html
│   ├── register.html
│   └── ...
├── ajax/                       // AJAX处理
│   └── index.php
│   └── ...
├── face/                       // 表情图片
│   └── ...
├── images/                     // 更多图片
│   └── touhou/                 // 主题
│   │   └── bg_touhou.jpg
│   │   └── ...
│   └── favicon.ico
│   └── ...
├── js/                         // JS文件
│   └── province.js
│   └── translate.js
├── language/                   // 国际化
│   └── language.ini
│   └── ...
├── movie/                      // 视频，音乐
│   └── Puella_Magi_Madoka.mp4
│   └── ...
└── upload/                     // 上传保存文件
```
