/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

/* eslint-disable import/extensions */
/* eslint-disable import/no-useless-path-segments */
import Chart from '../js/Chart.esm.js';

const countrySelect = document.getElementById('country-select');

// Global app state
const app = {
  data: {}, // JSON data from the API
  charts: [], // Reference to all charts
};

/**
 * Gets JSON data from API
 */
async function getJSONfromAPI() {
  const request = await fetch('/api.php', { method: 'GET' });
  const json = await request.json();
  return json;
}

function getCountrySizes(countryIndex) {
  const years = Object.keys(app.data.years);
  const countrySizes = [];

  years.forEach((year) => {
    let currentYearSize = 0;
    app.data.years[year].forEach((student) => {
      if (student.country === parseInt(countryIndex, 10)) {
        currentYearSize += student.size;
      }
    });

    countrySizes.push(currentYearSize);
  });

  return {
    years,
    countrySizes,
  };
}

function createCountryChart(countryIndex) {
  const data = getCountrySizes(countryIndex);
  const canvas = document.getElementsByClassName('country-chart-canvas')[0];

  const chart = new Chart(canvas.getContext('2d'), {
    type: 'bar',
    data: {
      labels: data.years,
      datasets: [{
        backgroundColor: 'green',
        data: data.countrySizes,
      }],
    },
    options: {
      maintainAspectRatio: false,
    },
  });

  return chart;
}

function createTypeChart() {
  const canvas = document.getElementsByClassName('type-chart-canvas')[0];

  const datasets = [];
  app.data.types.forEach((type, i) => {
    datasets[i] = {
      borderColor: 'green',
      label: type,
      data: [],
    };
  });

  Object.keys(app.data.years).forEach((year, y) => {
    app.data.years[year].forEach((student) => {
      if (!datasets[student.type].data[y]) {
        datasets[student.type].data[y] = 0;
      }
      datasets[student.type].data[y] += student.size;
    });
  });

  const chart = new Chart(canvas.getContext('2d'), {
    type: 'line',
    data: {
      labels: Object.keys(app.data.years),
      datasets,
    },
    options: {
      maintainAspectRatio: false,
    },
  });
}

function createLevelChart() {
  const canvas = document.getElementsByClassName('level-chart-canvas')[0];

  const datasets = [
    {
      label: app.data.levels[0],
      backgroundColor: 'green',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    },
    {
      label: app.data.levels[1],
      backgroundColor: 'lightgreen',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    },
  ];

  Object.keys(app.data.years).forEach((year, y) => {
    app.data.years[year].forEach((student) => {
      datasets[student.level].data[y] += student.size;
    });
  });

  const chart = new Chart(canvas.getContext('2d'), {
    type: 'bar',
    data: {
      labels: Object.keys(app.data.years),
      datasets,
    },
    options: {
      maintainAspectRatio: false,
    },
  });
}

function updateCountryChart(countryIndex) {
  const data = getCountrySizes(countryIndex);
  app.charts.country.data.datasets.length = 0;
  app.charts.country.data.datasets.push({
    backgroundColor: 'green',
    data: data.countrySizes,
  });
  app.charts.country.update();
}

countrySelect.addEventListener('change', (event) => {
  updateCountryChart(event.target.value);
});

// Get API data and create all charts with default year on page load
document.addEventListener('DOMContentLoaded', async () => {
  // Get JSON from API and add it to global app data
  app.data = await getJSONfromAPI();

  // Fill country select box with list of all countries
  app.data.countries.forEach((country, i) => {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = country;

    countrySelect.appendChild(option);
  });
  // Enable select box after filling it
  countrySelect.disabled = false;

  // Create charts and add reference to global charts array
  app.charts.country = createCountryChart(countrySelect.value);
  createTypeChart();
  createLevelChart();
});
