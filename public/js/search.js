window.addEventListener('DOMContentLoaded', function(){
    filter.addEventListener('input', function(e){
        let value = this.value;
        console.log(this.value)
        if(value)
            fetch('/public/spare-part/find/' + value).then(r=>r.json()).then(found=>{
                spare_part_id.innerHTML = null;
                for(let sp of found){
                    let option = document.createElement('option');
                    option.value = sp.id;
                    option.innerText = sp.name + ' ' + sp.maker;
                    spare_part_id.appendChild(option);
                }
            });
    });
});