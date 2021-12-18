keys = ["정보컴퓨터공학부", "의생명융합공학부", "전기공학과", "기계공학부", "전자공학과"];
urls = ["https://cse.pusan.ac.kr/cse/index.do", "https://bce.pusan.ac.kr/bce/index.do", 
"https://eec.pusan.ac.kr/eehome/index.do", "https://me.pusan.ac.kr/new/main/index.asp", "https://ee.pusan.ac.kr/ee/index.do"];

for(i = 0; i < keys.length; i++){
    localStorage.setItem(keys[i], urls[i]);
}


function start(){
    for(i = 0 ; i < keys.length; i++){
        const li = document.createElement("li");
        const key = keys[i];
        li.innerText = key;
        const url = localStorage.getItem(keys[i]);
        const btn = document.createElement("button");
        btn.innerText = "click";
        btn.addEventListener("click", function(){
            const ul = document.getElementById("web_ul");
            const option = document.createElement("li");
            const a = document.createElement("a");
            a.innerText = key;
            a.href = url;
            
            option.appendChild(a);
            ul.appendChild(option);
            
            li.setAttribute("hidden", true);
            this.setAttribute("hidden", true);
        })

        const kind = document.getElementById("web_kind");
        kind.appendChild(li);
        kind.appendChild(btn);
    }

    window.parent.postMessage({id:"iframe",modified:document.lastModified}, '*');
}
window.addEventListener("load", start);
