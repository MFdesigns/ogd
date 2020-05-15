/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

/* eslint-disable import/extensions */
/* eslint-disable import/no-useless-path-segments */
import Chart from '../js/Chart.esm.js';
import getJSONfromAPI from '../js/api.js';

const countrySelect = document.getElementById('country-select');

// Global app state
const app = {
  data: {}, // JSON data from the API
  charts: [], // Reference to all charts
  lang: 'de',
};

/**
 * Returns the country sizes throughout the current year from selected country
 * @param {number} countryIndex
 */
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

/**
 * Creates a country chart
 * @param {number} countryIndex
 */
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
      legend: {
        display: false,
        position: 'bottom',
      },
    },
  });

  return chart;
}

/**
 * Creates gender chart
 */
function createGenderChart() {
  const canvas = document.getElementsByClassName('gender-chart-canvas')[0];

  const datasets = [
    {
      label: app.data.genders[app.lang][0],
      backgroundColor: 'lightgreen',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    },
    {
      label: app.data.genders[app.lang][1],
      backgroundColor: 'green',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    },
  ];

  Object.keys(app.data.years).forEach((year, y) => {
    app.data.years[year].forEach((student) => {
      datasets[student.gender].data[y] += student.size;
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
      legend: {
        position: 'bottom',
      },
    },
  });
}

/**
 * Creates type chart
 */
function createTypeChart() {
  const canvas = document.getElementsByClassName('type-chart-canvas')[0];

  const datasets = [];
  const colors = ['darkgreen', 'lightgreen', 'limegreen', 'lawngreen', 'green'];

  app.data.types[app.lang].forEach((type, i) => {
    datasets[i] = {
      borderColor: colors[i],
      label: type,
      data: [],
      fill: false,
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
      legend: {
        position: 'bottom',
      },
    },
  });
}

/**
 * Creates level chart
 */
function createLevelChart() {
  const canvas = document.getElementsByClassName('level-chart-canvas')[0];

  const datasets = [
    {
      label: app.data.levels[app.lang][0],
      backgroundColor: 'green',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    },
    {
      label: app.data.levels[app.lang][1],
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
      legend: {
        position: 'bottom',
      },
    },
  });
}

/**
 * Updates country chart
 * @param {number} countryIndex
 */
function updateCountryChart(countryIndex) {
  const data = getCountrySizes(countryIndex);
  app.charts.country.data.datasets.length = 0;
  app.charts.country.data.datasets.push({
    backgroundColor: 'green',
    data: data.countrySizes,
  });
  app.charts.country.update();
}

// Update country chart on country selection change
countrySelect.addEventListener('change', (event) => {
  updateCountryChart(event.target.value);
});

/**
 * Fills country selection dropdown on page load
 */
function fillCountrySelect() {
  // Create copy of countries array
  const countries = [...app.data.countries[app.lang]];

  // Sort alphabetically
  countries.sort((a, b) => {
    if (a < b) { return -1; }
    if (a > b) { return 1; }
    return 0;
  });

  countries.forEach((country) => {
    const option = document.createElement('option');
    option.value = app.data.countries[app.lang].indexOf(country);
    option.textContent = country;

    countrySelect.appendChild(option);
  });
  // Enable select box after filling it
  countrySelect.disabled = false;
}

// Get API data and create all charts with default year on page load
document.addEventListener('DOMContentLoaded', async () => {
  // Get JSON from API and add it to global app data
  app.data = await getJSONfromAPI();

  // Set page language
  app.lang = document.documentElement.getAttribute('lang');

  fillCountrySelect();

  // Create charts and add reference to global charts array
  app.charts.country = createCountryChart(countrySelect.value);
  createGenderChart();
  createTypeChart();
  createLevelChart();
});
