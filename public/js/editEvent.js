const save_btn = document.querySelector("button#save");
const submit_btn = document.querySelector("button#submit");


save_btn.addEventListener("click", function(){
    console.log("Clicked");
    const event_name_data = document.querySelector("form h1");
    const event_location_data = document.querySelector("form #location");
    const event_date_data = document.querySelector("form #date");
    const event_time_data = document.querySelector("form #time");
    const event_description_data = document.querySelector("form .description");
    
    
    const event_name = document.querySelector("form #event_name");
    const event_location = document.querySelector("form #event_location");
    const event_date = document.querySelector("form #event_date");
    const event_description = document.querySelector("form #event_description");
    
    event_name.value = event_name_data.textContent; 
    event_location.value = event_location_data.textContent; 
    event_date.value = event_date_data.textContent+"T"+event_time_data.textContent; 
    event_description.value = event_description_data.textContent;

    
    submit_btn.click();
});
    