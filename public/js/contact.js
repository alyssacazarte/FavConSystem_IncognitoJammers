// ================ for the header ==================

let bar = document.querySelector('.bar')
let topBtn = document.querySelector('.topBtn')
let btn = document.querySelector('.topBtn i')
let contactBtn = document.querySelector('.container')
let btn2 = document.querySelector('.container a')
let nav = document.querySelector('nav ul')
let selectedItems = {};

bar.addEventListener('click', () => {
    bar.classList.toggle('active')
    nav.classList.toggle('active')
})

topBtn.addEventListener('click', () => {
    btn.click()
})
contactBtn.addEventListener('click', () => {
    btn2.click()
})


ScrollOut({
    targets: '.img, .aboutText , .box, div.left, div.right'
})
ScrollOut({
    targets: '.header',
    offset: 50
})
// ================ end for the header ==================


// ================ selecting service ===================

document.addEventListener("change", document.getElementById('service_id'), () => {
    console.log('change')
});

// ================== for the select servicies ==========================

var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        console.log(selElmnt.options[j].value);
        c.addEventListener("click", function (e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    let value = s.options[i].value
                    selectedItems['service_id'] = value
                    sendRequest(value);
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);




// ================== for the calendar and time ==================

let date = new Date();
let arr = [];

const renderCalendar = () => {
    if (arr.length > 0) {
        date = arr[0].date;
    }

    date.setDate(1);

    const monthDays = document.querySelector(".days");

    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    const firstDayIndex = date.getDay();

    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    document.querySelector(".date h1").innerHTML = months[date.getMonth()];

    document.querySelector(".date p").innerHTML = new Date().toDateString();

    let days = "";

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        let cl = 'none-active';
        let attr = '';

        if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()) {
            days += `<div class="${cl} today">${i}</div>`;
        }
        else {
            if (arr.length > 0) {
                let mon = date.getMonth() + 1;
                arr.forEach(r => {
                    if (r.day == i && mon == r.month) {
                        cl = 'can-click'
                        attr = `onClick="set(this)" data-id="${r.id}"`;
                    }
                })
            } days += `<div ${attr} class="${cl}">${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`;
        monthDays.innerHTML = days;
    }
};

document.querySelector(".prev").addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
});

function set(e) {
    let element = document.getElementsByClassName('actives')
    if (element.length > 0) {
        const boxes = document.getElementsByTagName("div");
        for (box of boxes) {
            console.log(box.classList.remove('actives'))
        }
    }
    e.setAttribute('class', 'actives')
    let day = e.innerHTML;
    let m = date.getMonth() + 1;

    selectedItems['schedule_id'] = e.getAttribute('data-id');

    arr.forEach(r => {
        if (r.day == day && r.month == m) {
            document.querySelector('.shadow').innerHTML = ''
            r.timeslot.forEach(time => {
                document.querySelector('.shadow').innerHTML += `<button onClick="clicked(this)" class='focus' data-id="${time.id}">${time.start_time}</button>`;
            })
        }
    });

    console.log(selectedItems);
}

renderCalendar();

// Sending request to database
async function sendRequest(id) {
    let form = document.getElementById('get-service');
    form.childNodes[3].value = id;

    let origin = window.location.origin;
    let url = origin + '/get-schedule'

    await fetch(url, {
        method: 'POST',
        credentials: "same-origin",
        body: new FormData(document.getElementById('get-service'))
    })
        .then((res) => res.json())
        .then(res => {
            arr = res.map(r => {
                return {
                    'id': r.id,
                    'month': new Date(r.date).getMonth() + 1,
                    'day': new Date(r.date).getDate(),
                    'date': new Date(r.date),
                    'timeslot': r.timeslot
                };
            });

            renderCalendar();
        })
}

function clicked(e) {
    let id = e.getAttribute('data-id')
    selectedItems['timeslot_id'] = id
}


function bookNow() {
    document.querySelector('#service').value = selectedItems['service_id'];
    document.querySelector('#schedule').value = selectedItems['schedule_id'];
    document.querySelector('#timeslot').value = selectedItems['timeslot_id'];
    document.querySelector('#name').value = document.querySelector('#submit-name').value;
    document.querySelector('#email').value = document.querySelector('#submit-email').value;
    document.querySelector('#address').value = document.querySelector('#submit-address').value;
    document.querySelector('#phone_no').value = document.querySelector('#submit-phone-no').value;
    document.querySelector('#notes').value = document.querySelector('#submit-note').value;

    document.getElementById('final-request').submit();
    // console.log(document.getElementById('final-request'));
}

// ------ for the language ----------

document.addEventListener('DOMContentLoaded', function() {
    const currentLanguageButton = document.querySelector('.current-language');
    const languageList = document.querySelector('.language-list');
    const languageItems = document.querySelectorAll('.language-list li');
  
    currentLanguageButton.addEventListener('click', function() {
      languageList.classList.toggle('active');
    });
  
    languageItems.forEach(item => {
      item.addEventListener('click', function() {
        const selectedLanguage = item.getAttribute('data-lang');
        const flagImage = item.querySelector('img').cloneNode(true);
        const languageText = item.textContent.trim();
  
        currentLanguageButton.innerHTML = '';
        currentLanguageButton.appendChild(flagImage);
        currentLanguageButton.innerHTML += languageText;
  
        languageList.classList.remove('active');
      });
    });
  });
