<style>
    .xit{
        font-style: italic;
        color:#FFFFFF;
    }
</style>
<html>
    <div class="col-md-12" style="margin-top:25px">
        <div class="col-md-12">
<!--            <div style="height:35px;width:6px;background:#2e6da4;box-shadow:2px 2px 5px #888888;float:left"></div>-->
            <div style="float:left;margin-left:15px;line-height:40px;font-size:17px;font-weight:bold">后台数据统计</div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:15px">
       <div class="col-md-3"  >
           <div style="height:170px;background:#2E9AFE;font-size:30px;text-align:center;padding-top:15px;box-shadow:2px 2px 5px #888888;">
               <div>订单数</div><div><span  class="xit"><?= $ordercount ?></span><span>(单)</span></div>
           </div>
       </div>
        <div class="col-md-3">
            <div style="height:170px;background:#FA5858;font-size:30px;text-align:center;padding-top:15px;box-shadow:2px 2px 5px #888888;">
                    <div>注册总人数</div>
                    <div><span  class="xit"><?= $usercount ?></span>(人)</div>
            </div>
       </div>
        <div class="col-md-3">
            <div style="height:170px;background:#00BFFF;font-size:30px;text-align:center;padding-top:15px;box-shadow:2px 2px 5px #888888;">
                     <div>新增代理人数</div>
                     <div ><span class="xit"><?= $managercount ?></span>(人)</div>
            </div>
       </div>
        <div class="col-md-3">
            <div style="height:170px;background:#D358F7;font-size:30px;text-align:center;padding-top:15px;box-shadow:2px 2px 5px #888888;">
                     <div>发布商品数</div>
                     <div ><span class="xit"><?= $goodcount ?></span>(件)</div>
            </div>
       </div>
    </div>
    <div class="col-md-12" style="margin-top:25px">
        <div class="col-md-12">
            <div style="float:left;margin-left:15px;line-height:40px;font-size:17px;font-weight:bold">网站信息</div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:15px">
            <div class="ibox-title col-md-12" style="border-bottom:none;background:#fff;padding-left:25px">
                <h5>服务器状态</h5>
            </div>
            <div class="ibox-content col-md-12" style="border-top:none;padding-left:25px">
                <div id="flot-line-chart-moving" style="height:217px;">
                                                     操作系统：<?php echo PHP_OS;?><br>
                                                     运行环境：<?php echo $_SERVER["SERVER_SOFTWARE"];?><br>
                                                        主机名：<?php echo $_SERVER['SERVER_NAME']?><br>
               WEB服务端口：<?php echo $_SERVER['SERVER_PORT']?><br>
                                             网站文档目录：<?php echo $_SERVER["DOCUMENT_ROOT"]?><br>
                                                浏览器信息：<?php echo substr($_SERVER['HTTP_USER_AGENT'], 0, 40)?><br>
                                                   通信协议：<?php echo $_SERVER['SERVER_PROTOCOL']?><br>
                                                   请求方法：<?php echo $_SERVER['REQUEST_METHOD']?><br>
                                               服务器时间：<?php echo date("Y年n月j日 H:i:s")?><br>
                                                  北京时间：<?php echo gmdate("Y年n月j日 H:i:s",time()+8*3600)?><br>
                                                  剩余空间：<?php echo round((disk_free_space(".")/(1024*1024)),2).'M'?><br>
                                           用户的IP地址：<?php echo $_SERVER['REMOTE_ADDR']?><br>
                </div>
            </div>
    </div>
</html>