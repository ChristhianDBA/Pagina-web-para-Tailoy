// Gráfico de pastel para "Productos con Stock Mínimo"
var ctx1 = document.getElementById("stockMinimo").getContext('2d');
var myPieChart1 = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: ["Azul", "Gris", "Amarillo", "Verde"],
        datasets: [{
            data: [10, 15.58, 11.25, 8.32],
            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#808080'],
        }],
    },
});

// Gráfico de dona para "Top Ventas"
var ctx2 = document.getElementById("TopVentas").getContext('2d');
var myPieChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ["Azul", "Gris", "Amarillo", "Verde"],
        datasets: [{
            data: [10, 15.58, 11.25, 8.32],
            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#808080'],
        }],
    },
});