# AL_lolimeow for Typecho
基于Wordpress 主题 lolimeow 开发的Typecho AL_lolimeow主题

作者:[Alone88][1]  
Email:im#alone88.cn (#换成@)  
Wordpress form [猫可喵][2]  

##### 主题演示

   https://typecho.alapi.cn


### 下载

Github:https://github.com/anhao/al_lolimeow  
CDN下载：待添加

### 特点 
 - 基于Bootstrap
 - 页面预加载 基于InstantClick的Pjax预加载,让网站飞起来
 - CDN 调用静态css,和js
 - HighlightJS代码高亮，支持22种编程代码
 - 响应式设计，支持平板与手机，访问体验极佳
 - 支持文章图片缩略图,自动获取文章第一张图片为缩略图，如果没用则随机返回一个图片
 - 使用animate+wowjs 添加页面动画
 - 内嵌了 Valine 评论插件  https://valine.js.org/
 - 基于sm.ms 的图片上传页面
 - 基于Typecho Links 的友情链接页面(需要安装Links插件修改版)
 - 还有更多等你发现...ヾ(•ω•`)o

## 主题使用

### 主题设置
主题支持设置：
 - 站点LOGO地址
 - Favicon地址
 - Apple touch icon地址
 - 默认缩略图
 - QQ、Github、Email、Weibo
 - 底部链接
 - 首页是否显示友情链接,及显示数量、友链申请页面
 - PJAX 加速开关
 - 相关文章推荐开关
 - Valine设置
 
### 关于文章缩略图
文章设置缩略图方法有四种，自定义字段thumb，文章附件第一张图片，文章内图片，默认缩略图
优先级顺序 ：自定义字段 thumb -> 附件第一张图片 -> 文章图片 -> 默认缩略图 -> 随机图片 -> 无

### 关于友情链接
友情链接我使用的Links插件,因为Links 默认的样式不适配这个主题，所以修改了Links插件的一些
样式，所以要使用友情链接的话需要下载适配的Links插件  
Links插件下载地址：https://github.com/anhao/Typecho_Links

### 关于Valine
Valine - 一款快速、简洁且高效的无后端评论系统。

Valine 评论数据是存储在Leancloud的，所以你要使用Valine 需要注册Leancloud

了解Valine 请访问：https://valine.js.org/

### 浏览器兼容
只要浏览器不要太老...

[1]:https://alone88.cn/
[2]:https://mkm.st