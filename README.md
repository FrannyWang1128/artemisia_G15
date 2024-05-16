# ict4d_G15
Our voice application provides an artemisia market connection service which can be accessed by phone calls. It supports two languages which are English and French. When our users dial in, they are first greeted in both English and French, which is used to select the service language. After choosing the language, users can choose to enter either the farmer or buyer interface. Pressing '1' will take the user to the farmer interface, and pressing '2' will take them to the buyer interface. In the farmer interface, farmers can press '1' to check market prices, press '2' to enter their ID and the price and quantity they wish to sell, press '3' to share farming experiences, press '4' to receive messages from buyers, press '#' to return to the main menu, and press '' to exit the application. In the buyer interface, buyers can press '1' to obtain each farmer’s ID, inventory, and prices, press '2' to enter the farmer's ID they wish to buy from, their own ID, and the quantity they want to buy, press '#' to return to the main menu, and press '' to exit the application.
Please dial the phone number:+18002895570 with pin:9991495080 and follow the guidence.















#
```
 <prompt> 提供语音提示
 
 <menu> 接收用户的选择使用 
   
<field> 接收用户的语音输入

<data> 用于从外部源获取数据并将其存储在 VoiceXML 应用程序中的变量中；VoiceXML 应用程序运行时，它将向指定的 URL 发送请求，并将返回的数据存储在变量中
<record> 元素，用于录制用户的语音输入
<submit> 元素，用于在表单提交时将数据发送到指定的 URL。next 属性指定了要发送数据的目标 URL，namelist指定了要提交的变量列表
```
