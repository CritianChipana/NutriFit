let ctx = document.getElementById('myChart').getContext('2d');

let meta = [80,79,78,77,76,75,74,73,72,71,70];
let desplazo= [80,80,79,78,77,76,75];

let dataset2 = [
  {
    label: 'META',
    data: meta,
    backgroundColor: [
      '#54BF29',
    ],
    borderColor:[
    '#54BF29',
    ],
    parsing: {  
    yAxisKey: 'net'
    }
  },
  {
    label: 'PROGRESO',
    data: desplazo,
    backgroundColor: [
      '#FF922C',
    ],
    borderColor: [
    '#FF922C',
    ],            
    parsing: {
        yAxisKey: 'cogs'
    }
  },
  // {
  //   label: 'Tercer Arreglo',
  //   data: [50,40,30,20,10,0],
  //   backgroundColor: [
  //     'rgb(255, 205, 86)'
  //   ],
  //   borderColor: [
  //   'rgb(255, 205, 86)'
  //   ],
  //   parsing: {
  //       yAxisKey: 'cogs'
  //   }
  // }
];


let data2 ={

  labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Dicienbre"],
  datasets: dataset2
};


let myChart = new Chart(ctx, {
  type: 'line',
  data: data2
});

