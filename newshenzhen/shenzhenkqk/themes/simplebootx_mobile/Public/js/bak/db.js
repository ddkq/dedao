function db0(){ 
	var box = document.getElementById("tabs_content0"); 
	var text = box.innerHTML; 
	var newBox = document.createElement("div"); 
	var btn = document.createElement("a"); 
	btn.className="zkgd";
	newBox.innerHTML = text.substring(0,120); 
	if(text.length<=120){$(btn).hide();}
	btn.innerHTML = text.length > 120 ? "展开更多" : ""; 
	btn.onclick = function(){ 
	if (btn.innerHTML == "展开更多"){ 
	btn.innerHTML = "收起"; 
	newBox.innerHTML = text; 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_b.jpg) 64px 6px no-repeat" });
	}else{ 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_a.jpg) 64px 6px no-repeat" });
	btn.innerHTML = "展开更多"; 
	newBox.innerHTML = text.substring(0,120); 
	} 
	} 
	box.innerHTML = ""; 
	box.appendChild(newBox); 
	box.appendChild(btn); 
} 
db0();
function db1(){ 
	var box = document.getElementById("tabs_content1"); 
	var text = box.innerHTML; 
	var newBox = document.createElement("div"); 
	var btn = document.createElement("a"); 
	btn.className="zkgd";
	newBox.innerHTML = text.substring(0,120); 
	if(text.length<=120){$(btn).hide();}
	btn.innerHTML = text.length > 120 ? "展开更多" : ""; 
	btn.onclick = function(){ 
	if (btn.innerHTML == "展开更多"){ 
	btn.innerHTML = "收起"; 
	newBox.innerHTML = text; 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_b.jpg) 64px 6px no-repeat" });
	}else{ 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_a.jpg) 64px 6px no-repeat" });
	btn.innerHTML = "展开更多"; 
	newBox.innerHTML = text.substring(0,120); 
	} 
	} 
	box.innerHTML = ""; 
	box.appendChild(newBox); 
	box.appendChild(btn); 
} 
db1();
function db2(){ 
	var box = document.getElementById("tabs_content2"); 
	var text = box.innerHTML; 
	var newBox = document.createElement("div"); 
	var btn = document.createElement("a"); 
	btn.className="zkgd";
	newBox.innerHTML = text.substring(0,120); 
	if(text.length<=120){$(btn).hide();}
	btn.innerHTML = text.length > 120 ? "展开更多" : ""; 
	btn.onclick = function(){ 
	if (btn.innerHTML == "展开更多"){ 
	btn.innerHTML = "收起"; 
	newBox.innerHTML = text; 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_b.jpg) 64px 6px no-repeat" });
	}else{ 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_a.jpg) 64px 6px no-repeat" });
	btn.innerHTML = "展开更多"; 
	newBox.innerHTML = text.substring(0,120); 
	} 
	} 
	box.innerHTML = ""; 
	box.appendChild(newBox); 
	box.appendChild(btn); 
} 
db2();
function db3(){ 
	var box = document.getElementById("tabs_content3"); 
	var text = box.innerHTML; 
	var newBox = document.createElement("div"); 
	var btn = document.createElement("a"); 
	btn.className="zkgd";
	newBox.innerHTML = text.substring(0,120); 
	if(text.length<=120){$(btn).hide();}
	btn.innerHTML = text.length > 120 ? "展开更多" : ""; 
	btn.onclick = function(){ 
	if (btn.innerHTML == "展开更多"){ 
	btn.innerHTML = "收起"; 
	newBox.innerHTML = text; 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_b.jpg) 64px 6px no-repeat" });
	}else{ 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_a.jpg) 64px 6px no-repeat" });
	btn.innerHTML = "展开更多"; 
	newBox.innerHTML = text.substring(0,120); 
	} 
	} 
	box.innerHTML = ""; 
	box.appendChild(newBox); 
	box.appendChild(btn); 
} 
db3();
function db4(){ 
	var box = document.getElementById("tabs_content4"); 
	var text = box.innerHTML; 
	var newBox = document.createElement("div"); 
	var btn = document.createElement("a"); 
	btn.className="zkgd";
	newBox.innerHTML = text.substring(0,120); 
	if(text.length<=120){$(btn).hide();}
	btn.innerHTML = text.length > 120 ? "展开更多" : ""; 
	btn.onclick = function(){ 
	if (btn.innerHTML == "展开更多"){ 
	btn.innerHTML = "收起"; 
	newBox.innerHTML = text; 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_b.jpg) 64px 6px no-repeat" });
	}else{ 
	$(btn).css({ background: "#e2e1df url(/public/images/s7_a.jpg) 64px 6px no-repeat" });
	btn.innerHTML = "展开更多"; 
	newBox.innerHTML = text.substring(0,120); 
	} 
	} 
	box.innerHTML = ""; 
	box.appendChild(newBox); 
	box.appendChild(btn); 
} 
db4();