const $=s=>document.querySelector(s);
const form=$('#uploadForm'), file=$('#proxyFile'), results=$('#results'), saveBtn=$('#saveBtn');
let rows=[], running=false;

function esc(v){return String(v??'').replace(/[&<>"']/g,m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m]))}
function render(){
 const q=$('#search').value.toLowerCase(), f=$('#filter').value;
 const view=rows.filter(r=>(f==='all'||(f==='live'?r.live:!r.live)) &&
 [r.proxy,r.ip,r.country,r.city,r.isp,r.asn].join(' ').toLowerCase().includes(q));
 results.innerHTML=view.length?view.map(r=>`<tr>
 <td>${esc(r.proxy)}</td><td><span class="badge ${r.live?'live':'bad'}">${r.live?'LIVE / UNBLOCKED':'BLOCKED / FAILED'}</span></td>
 <td>${esc(r.ip||'-')}</td><td>${esc(r.city||'Unknown')}, ${esc(r.country||'Unknown')}</td>
 <td>${esc(r.isp||'Unknown')} ${esc(r.asn||'')}</td><td>${esc(r.ms||'-')} ms</td></tr>`).join(''):'<tr><td colspan="6" class="empty">No matching results.</td></tr>';
 $('#total').textContent=rows.length; $('#live').textContent=rows.filter(x=>x.live).length;
 $('#blocked').textContent=rows.filter(x=>!x.live).length; $('#checked').textContent=rows.length;
 saveBtn.disabled=!rows.some(x=>x.live);
}
async function get(url){const r=await fetch(url);return r.json()}
form.addEventListener('submit',async e=>{
 e.preventDefault(); if(running)return;
 const fd=new FormData(); fd.append('proxy_file',file.files[0]);
 const res=await fetch('api.php?action=upload',{method:'POST',body:fd}).then(x=>x.json());
 if(!res.ok)return alert(res.error||'Upload failed');
 rows=[]; running=true; $('#progressBox').classList.remove('hidden'); render();
 for(let i=0;i<res.items.length;i++){
   const p=res.items[i];
   try{const x=await get(`api.php?action=check&host=${encodeURIComponent(p.host)}&port=${p.port}`); if(x.ok)rows.push(x.result)}
   catch(e){rows.push({proxy:p.proxy,live:false,error:'Request error'})}
   const pct=Math.round(((i+1)/res.items.length)*100);
   $('#progressBar').style.width=pct+'%'; $('#progressText').textContent=pct+'%'; render();
 }
 running=false; alert('Checking complete.');
});
$('#search').addEventListener('input',render); $('#filter').addEventListener('change',render);
saveBtn.addEventListener('click',()=>{
 const live=rows.filter(x=>x.live);
 const text=live.map(x=>x.proxy).join('\n');
 const a=document.createElement('a');a.href=URL.createObjectURL(new Blob([text],{type:'text/plain'}));
 a.download='live-unblocked-proxies.txt';a.click();URL.revokeObjectURL(a.href);
});
