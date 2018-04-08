$(document).ready(function(){
    // 批量复制
    $("#copy").click(function(){
        var aux = document.createElement("textarea");
        var content = "";
        $('ul#copy-content li').each(function(){
            var item = $(this).find("a.ddplay");
            if(item != null && item != undefined && item != ""
                && item.attr("href") != "" && item.attr("href") != undefined)
                content += item.attr("href")+"\r\n";
        })
        if(content != "" && content != null && content != undefined) {
            aux.textContent = content;
            // aux.setAttribute("value", content);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
            alert("复制成功");
        }
    }) ;

    $(window).scroll(function(){
       var top = $(window).scrollTop();
       if(top > 600) {
           $('.button-top').show();
       } else {
           $('.button-top').hide();
       }
    });

    $('.button-top').click(function(){
        $("html,body").animate({scrollTop:0}, 500);
    });
});

window.onscroll = function(){
    sTop = $(window).offsetTop;
    if(sTop > 300) {
        alert("Asfd");
    }
}

//Handle IE
function launchIE(ev){
    var url = getUrl(),
        aLink = $('#hiddenLink')[0];
    isSupported = false;
    aLink.href = url;
    //Case 1: protcolLong
    console.log("Case 1");
    if(navigator.appName=="Microsoft Internet Explorer"
        && (aLink.protocolLong=="Unknown Protocol" || aLink.protocolLong == "未知协议" || aLink.protocolLong == "未知协议")){
        isSupported = false;
        result(ev);
        return;
    }

    //IE10+
    if(navigator.msLaunchUri){
        navigator.msLaunchUri(url,
            function(){ isSupported = true; result(ev); }, //success
            function(){ isSupported=false; result(ev);  }  //failure
        );
        return;
    }

    //Case2: Open New Window, set iframe src, and access the location.href
    console.log("Case 2");
    var myWindow = window.open('','','width=0,height=0');
    myWindow.document.write("<iframe src='"+ url + "></iframe>");
    setTimeout(function(){
        try{
            myWindow.location.href;
            isSupported = true;
        }catch(e){
            //Handle Exception
        }
        if(isSupported){
            myWindow.setTimeout('window.close()', 100);
        }else{
            myWindow.close();
        }
        result(ev);
    }, 100)
};

//Handle Firefox
function launchMozilla(ev){
    var url = getUrl(),
        iFrame = $('#hiddenIframe')[0];
    isSupported = false;
    //Set iframe.src and handle exception
    try{
        iFrame.contentWindow.location.href = url;
        isSupported = true;
        result(ev);
    }catch(e){
        //FireFox
        if (e.name == "NS_ERROR_UNKNOWN_PROTOCOL"){
            isSupported = false;
            result(ev);
        }
    }
}

//Handle Chrome
function launchChrome(ev){
    var url = getUrl(),
        protcolEl = $('.ddplay')[0];
    isSupported = false;
    protcolEl.focus();
    protcolEl.onblur = function(){
        isSupported = true;
        console.log("Text Field onblur called");
    };
    //will trigger onblur
    location.href = url;
    //Note: timeout could vary as per the browser version, have a higher value
    setTimeout(function(){
        protcolEl.onblur = null;
        result(ev)
    }, 500);
}