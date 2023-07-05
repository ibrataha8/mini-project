const heureDebut = document.querySelector('[name="heureD"]');
const heureFin = document.querySelector('[name="heureF"]');
let hours = [];
let now  = new Date();
now.setHours(9,30,0);
for (let i = 1; i < 22; i++) {
  hours.push(now.toISOString().split('T')[1].slice(0,5))
  now.setTime(now.getTime() + 30*60*1000);
}
let optionsHours = '' ;
for (const hour of hours) {
  optionsHours+=`<option value="${hour}">${hour}</option>`;
}
heureDebut.innerHTML = optionsHours;
heureFin.innerHTML = optionsHours;