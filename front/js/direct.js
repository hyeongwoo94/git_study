/*
    익스플로어로 들어왔을경우 엣지로 변경시켜줌
*/

if(navigator.userAgent.indexOf("Trident") > 0){
       
    alert(document.title+"은 Microsoft Edge, Chrome 브라우저에 최적화 되어있습니다. " +
        "원활한 사용을 원하시면 Microsoft Edge, Chrome 브라우저를 권장합니다. 확인버튼을 누르면 Edge브라우저로 자동으로 이동됩니다.")
    window.location = 'microsoft-edge:' + window.location.href
}
else if(/MSIE \d |Trident.*rv:/.test(navigator.userAgent)){

    alert(document.title+"은 Microsoft Edge, Chrome 브라우저에 최적화 되어있습니다. " +
        "원활한 사용을 원하시면 Microsoft Edge, Chrome 브라우저를 권장합니다.  확인버튼을 누르면 Edge브라우저로 자동으로 이동됩니다.")
    window.location = 'microsoft-edge:http:' + window.location.href
}