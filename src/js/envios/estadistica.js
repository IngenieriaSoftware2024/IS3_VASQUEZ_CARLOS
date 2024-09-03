import { Dropdown } from "bootstrap";
import { Chart } from "chart.js/auto";

const canvas = document.getElementById('ChartEnvios');
const ctx = canvas.getContext('2d');
const BtnActualizar = document.getElementById('BtnActualizar');


const data = {
    labels: [],
    datasets: [{
        label: 'Envios',
        data: [],
        borderWidth: 5,
        backgroundColor: []
    }]
};

const chartVentas= new Chart(ctx, {
    type: 'bar',
    data: data,
});

const getEstadisticas = async () => {
    const url = '/IS3_VASQUEZ_CARLOS/API/envio/estadistica'
    const config = { method: "GET" }
    const response = await fetch(url, config);
    const data = await response.json()
    console.log(data);

    if(data){
        if(chartVentas.data.datasets[0]) {
            chartVentas.data.labels = [];
            chartVentas.data.datasets[0].data = [];
            chartVentas.data.datasets[0].backgroundColor = [];
            data.forEach(opciones => {
                chartVentas.data.labels.push(opciones.usu_nombre);
                chartVentas.data.datasets[0].data.push(opciones.envios);
                chartVentas.data.datasets[0].backgroundColor.push(generateRandomColor());
            });
        }
    }

    chartVentas.update();
}

const generateRandomColor = () => {
    const r = Math.floor(Math.random() * 256); 
    const g = Math.floor(Math.random() * 256); 
    const b = Math.floor(Math.random() * 256); 

    const rgbColor = `rgb(${r}, ${g}, ${b})`;
    return rgbColor;
}

BtnActualizar.addEventListener('click', getEstadisticas);