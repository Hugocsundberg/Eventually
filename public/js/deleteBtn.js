let delete_btns = document.querySelectorAll('#delete_btn');

delete_btns.forEach(delete_btn => {
    
    delete_btn.addEventListener('click', (e)=>{
        
        e.preventDefault();
        const comfirmed = window.confirm("Are you sure you want to delete this event?");
        if(comfirmed){
            let lnk = window.location.href;
            window.location.replace(lnk+'/delete');
        }
        return false;
        
    })
});