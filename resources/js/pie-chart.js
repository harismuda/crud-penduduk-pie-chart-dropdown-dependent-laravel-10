import Chart from 'chart.js';

document.addEventListener('DOMContentLoaded', function() {
  const data = {
    labels: ['Data 1', 'Data 2', 'Data 3'],
    datasets: [{
      data: [30, 50, 20],
      backgroundColor: ['red', 'green', 'blue'],
    }],
  };

  const options = {
    responsive: false,
  };

  const pieChart = new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: data,
    options: options,
  });
});