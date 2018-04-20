var _index = 0; //记录上一次点击下标
$(function () {
    $("footer .footer-main .setting").click(function() {
        var index = $(this).index();
        $("footer .footer-main .setting .pics").filter(".active").removeClass('active').end().eq(index).addClass('active');
        $("footer .footer-main .setting .intros").filter(".active").removeClass('active').end().eq(index).addClass('active');
         setLocation.setHref(index);
    });
    // 详情页 .detailId
    mui(document).on('tap', '.detailId', function() {
        setLocation.openWindow("detail.html");
    })
    // 分类页 .fenId
    mui(document).on('tap', '.fenId', function() {
        setLocation.openWindow("tab-vertical-scroll.html");
    })
    //消息 .messageId
    mui(document).on('tap', '.messageId', function() {
        setLocation.openWindow("qzzMessage.html");
    })
    //购物车 .shopId
    mui(document).on('tap', '.shopId', function() {
        setLocation.openWindow("shop.html");
    })
    // 购买  .purchaseId
    mui(document).on('tap', '.purchaseId', function() {
        setLocation.openWindow("notarize_order.html");
    })
    // 评价 .evaluateId
    mui(document).on('tap', '.evaluateId', function() {
        setLocation.openWindow("evaluate.html");
    })
    // 收藏 .collectionId
    mui(document).on('tap', '.collectionId', function() {
        setLocation.openWindow("collection.html");
    })
    // 优惠券 .cashId
    mui(document).on('tap', '.cashId', function() {
        setLocation.openWindow("qzzCash.html");
    })
    // 优惠券 .memberId
    mui(document).on('tap', '.memberId', function() {
        setLocation.openWindow("qzzMember.html");
    })
    //结算 .submit_accountId
    mui(document).on('tap', '.submit_accountId', function() {
        setLocation.openWindow("qzzOrder.html");
    })
    //支付 .qzzPayId
    mui(document).on('tap', '.qzzPayId', function() {
        setLocation.openWindow("qzzPaySuccess.html");
    })
    //地址 .addressId
    mui(document).on('tap', '.addressId', function() {
        setLocation.openWindow("qzzaddress.html");
    })
    //添加地址 .qzzeditId
    mui(document).on('tap', '.qzzeditId', function() {
        setLocation.openWindow("qzzedit_update.html");
    })
    //物流 .wuliuId
    mui(document).on('tap', '.wuliuId', function() {
        setLocation.openWindow("logistics_message_details.html");
    })
    //订单详情 .orderId
    mui(document).on('tap', '.orderId', function() {
        setLocation.openWindow("back_commodity.html");
    })
    //订单 .ordersId
    mui(document).on('tap', '.ordersId', function() {
        setLocation.openWindow("order.html");
    })
    //个人信息  .introId
    mui(document).on('tap', '.introId', function() {
        setLocation.openWindow("qzzMyintro.html");
    })
    //昵称  .nameId
    mui(document).on('tap', '.nameId', function() {
        setLocation.openWindow("qzznameset.html");
    })
    //密码  .passId
    mui(document).on('tap', '.passId', function() {
        setLocation.openWindow("qzzmypass.html");
    })
    //登录  .loginId
    mui(document).on('tap', '.loginId', function() {
        setLocation.openWindow("qzzlogin.html");
    })
    //退出登录  .tuichuId
    mui(document).on('tap', '.tuichuId', function() {
        setLocation.openWindow("index.html");
    })
    //我的  .myId
    mui(document).on('tap', '.myId', function() {
        setLocation.openWindow("/usercetner/index");
    })
})

var setLocation = {

	setHref: function(id) {
        console.log(_index + "=" + id);
        var url = "",
            type = false;
        switch (parseInt(id)) {
            case 0:
                url = "index.html";
                break;
            case 1:
                type = true;
                url = "tea.html";
                break;
            case 2:
                type = true;
                url = "store.html";
                break;
            case 3:
                type = true;
                url = "shop.html";
                break;
            default:
                type = true;
                url = "qzzmy.html";
        }
        setLocation.openWindow(url);
    },
    openWindow: function (url) {
		window.location.href = url;
    }
}