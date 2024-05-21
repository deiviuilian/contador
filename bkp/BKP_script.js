let to = new Date('may 31 2024 17:00:00');
function update(){
    let from = new Date();
    diff = to-from;
    if(diff>0){
        let days = setTwoDigit(Math.floor(diff/1000/60/60/24)),
        hours = setTwoDigit(Math.floor(diff/1000/60/60)%24),
        min = setTwoDigit(Math.floor(diff/1000/60)%60),
        sec = setTwoDigit(Math.floor(diff/1000)%60)
        document.querySelector('.days').innerText=days
        document.querySelector('.hours').innerText=hours
        document.querySelector('.minutes').innerText=min
        document.querySelector('.seconds').innerText=sec
    }else{
        clearInterval(interval);
        document.querySelector('body').classList.add('alert');
    }
}

let interval=setInterval(update,1000);

function setTwoDigit(argument) {
    return argument>9?argument:'0'+argument;
}

document.querySelector(".clock .days").innerHTML = (
    new Array(31).fill(0).map((n,i)=>{
        return `
            <div>
                ${i<10 ? "0"+i : i}
            </div>
        `;
    }).join("")
);

document.querySelector(".clock .hours").innerHTML = (
    new Array(24).fill(0).map((n,i)=>{
        return `
            <div>
                ${i<10 ? "0"+i : i}
            </div>
        `;
    }).join("")
);

document.querySelector(".clock .minutes").innerHTML = (
    new Array(60).fill(0).map((n,i)=>{
        return `
            <div>
                ${i<10 ? "0"+i : i}
            </div>
        `;
    }).join("")
);

document.querySelector(".clock .seconds").innerHTML = (
    new Array(60).fill(0).map((n,i)=>{
        return `
            <div>
                ${i<10 ? "0"+i : i}
            </div>
        `;
    }).join("")
);

let time = new Date();
let 
prevDays = time.getDate() * 200,
prevHours = time.getHours() * 200,
prevMinutes = time.getMinutes() * 200,
prevSeconds = time .getSeconds() * 200;

document.querySelector(".clock .days div").style.marginTop = `-${prevDays}px`;
document.querySelector(".clock .hours div").style.marginTop = `-${prevHours}px`;
document.querySelector(".clock .minutes div").style.marginTop = `-${prevMinutes}px`;
document.querySelector(".clock .seconds div").style.marginTop = `-${prevSeconds}px`;


function updateClock(){
    let time = new Date();
    let 
    days = time.getDate() * 200,
    hours = time.getHours() * 200,
    minutes = time.getMinutes() * 200,
    seconds = time.getSeconds() * 200;

    if(prevDays !== days){
        prevDays = days;
        document.querySelector(".clock .days div").style.marginTop = `-${days}px`;
        document.querySelector(".clock .days").classList.add("animate"); 
        setTimeout(function(){
            document.querySelector(".clock .days").classList.remove("animate");
        }, 800); 
    }

    if(prevHours !== hours){
        prevHours = hours;
        document.querySelector(".clock .hours div").style.marginTop = `-${hours}px`;
        document.querySelector(".clock .hours").classList.add("animate"); 
        setTimeout(function(){
            document.querySelector(".clock .hours").classList.remove("animate");
        }, 800); 
    }

    if(prevMinutes !== minutes){
        prevMinutes = minutes;
        document.querySelector(".clock .minutes div").style.marginTop = `-${minutes}px`;
        document.querySelector(".clock .minutes").classList.add("animate"); 
        setTimeout(function(){
            document.querySelector(".clock .minutes").classList.remove("animate");
        }, 800); 
    }

    if(prevSeconds !== seconds){
        prevMSeconds = seconds;
        document.querySelector(".clock .seconds div").style.marginTop = `-${seconds}px`;
        document.querySelector(".clock .seconds").classList.add("animate"); 
        setTimeout(function(){
            document.querySelector(".clock .seconds").classList.remove("animate");
        }, 800); 
    }
}

setInterval(updateClock, 1000);