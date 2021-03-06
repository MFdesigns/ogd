/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

/* eslint-disable import/extensions */
/* eslint-disable import/no-useless-path-segments */
import Chart from '../js/Chart.esm.js';
import getJSONfromAPI from '../js/api.js';

// Global app state
const app = {
  data: {}, // JSON data from the API
  charts: [], // Reference to all charts
  lang: 'de',
};

// Year selection dropdown
const yearSelect = document.getElementById('year-select');

/**
 * Gets the amount of male/female students in given year
 * @param {string} year Selected year
 */
function getGenderCount(year) {
  // Get students from selected year
  const students = app.data.years[year];
  let maleCount = 0;
  let femaleCount = 0;

  // Loop trough each student and increment male/female counter
  students.forEach((student) => {
    switch (student.gender) {
      case 0: // female
        femaleCount += student.size;
        break;

      case 1: // male
        maleCount += student.size;
        break;

      default:
        break;
    }
  });

  return {
    male: maleCount,
    female: femaleCount,
  };
}

/**
 * Gets the amount of the level from studentents in given year
 * @param {string} year Selected year
 */
function getLevelCount(year) {
  const students = app.data.years[year];
  let levelOneCount = 0;
  let levelTwoCount = 0;

  students.forEach((student) => {
    switch (student.level) {
      case 0:
        levelOneCount += student.size;
        break;

      case 1:
        levelTwoCount += student.size;
        break;

      default:
        break;
    }
  });

  return {
    levelOne: levelOneCount,
    levelTwo: levelTwoCount,
  };
}

/**
 * Gets the amount of the students school type in given year
 * @param {string} year Selected year
 */
function getTypeCount(year) {
  const students = app.data.years[year];
  let typeFMSCount = 0;
  let typeGYMCount = 0;
  let typeHMSCount = 0;
  let typeIMSCount = 0;
  let typePASCount = 0;

  students.forEach((student) => {
    switch (student.type) {
      case 0:
        typeFMSCount += student.size;
        break;

      case 1:
        typeGYMCount += student.size;
        break;

      case 2:
        typeHMSCount += student.size;
        break;

      case 3:
        typeIMSCount += student.size;
        break;

      case 4:
        typePASCount += student.size;
        break;

      default:
        break;
    }
  });

  return {
    FMS: typeFMSCount,
    GYM: typeGYMCount,
    HMS: typeHMSCount,
    IMS: typeIMSCount,
    PAS: typePASCount,
  };
}

/**
 * Gets the amount of the students countries in given year
 * @param {string} year Selected year
 */
function getCountryCount(year) {
  const students = app.data.years[year];
  const countries = {};

  students.forEach((student) => {
    const countryName = app.data.countries[app.lang][student.country];

    if (countries.hasOwnProperty(countryName)) {
      countries[countryName] += student.size;
    } else {
      countries[countryName] = student.size;
    }
  });

  return countries;
}


/**
 * Creates gender chart and adds it to page
 * @param {string} year Selected year
 * @returns {Chart}
 */
function createGenderChart(year) {
  const canvas = document.getElementsByClassName('gender-chart-canvas')[0];
  const genderCount = getGenderCount(year);
  const chart = new Chart(canvas.getContext('2d'), {
    type: 'pie',
    data: {
      datasets: [{
        data: [genderCount.female, genderCount.male],
        backgroundColor: [
          'pink',
          'lightblue',
        ],
      }],
      labels: [
        app.data.genders[app.lang][0],
        app.data.genders[app.lang][1],
      ],
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        position: 'bottom',
      },
    },
  });

  return chart;
}

/**
 * Creates level chart and adds it to page
 * @param {string} year Selected year
 * @returns {Chart}
 */
function createLevelChart(year) {
  const canvas = document.getElementsByClassName('level-chart-canvas')[0];
  const levelCount = getLevelCount(year);
  const chart = new Chart(canvas.getContext('2d'), {
    type: 'pie',
    data: {
      datasets: [{
        data: [levelCount.levelOne, levelCount.levelTwo],
        backgroundColor: [
          'green',
          'lightgreen',
        ],
      }],
      labels: app.data.levels[app.lang],
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        position: 'bottom',
      },
    },
  });

  return chart;
}

/**
 * Creates type chart and adds it to page
 * @param {string} year Selected year
 * @returns {Chart}
 */
function createTypeChart(year) {
  const canvas = document.getElementsByClassName('type-chart-canvas')[0];
  const typeCount = getTypeCount(year);
  const chart = new Chart(canvas.getContext('2d'), {
    type: 'pie',
    data: {
      datasets: [{
        data: [typeCount.FMS, typeCount.GYM, typeCount.HMS, typeCount.IMS, typeCount.PAS],
        backgroundColor: [
          'darkgreen',
          'lightgreen',
          'limegreen',
          'lawngreen',
          'green',
        ],
      }],
      labels: app.data.types[app.lang],
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        position: 'bottom',
      },
    },
  });

  return chart;
}

/**
 * Creates country chart and adds it to page
 * @param {string} year Selected year
 * @returns {Chart}
 */
function createCountryChart(year) {
  const canvas = document.getElementsByClassName('country-chart-canvas')[0];

  const countries = getCountryCount(year);
  const countryNames = Object.keys(countries);
  const countrySizes = Object.values(countries);
  const colors = [];

  for (let i = 0; i < countrySizes.length; i += 1) {
    colors.push('green');
  }

  const chart = new Chart(canvas.getContext('2d'), {
    type: 'horizontalBar',
    data: {
      datasets: [{
        data: countrySizes,
        backgroundColor: colors,
      }],
      labels: countryNames,
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
    },
  });

  return chart;
}

/**
 * Updates gender chart with given year
 * @param {string} year Selected year
 */
function updateGenderChart(year) {
  const genderCount = getGenderCount(year);
  // Clear data
  app.charts.gender.data.datasets.length = 0;
  app.charts.gender.data.datasets.push({
    data: [genderCount.female, genderCount.male],
    backgroundColor: [
      'pink',
      'lightblue',
    ],
  });
  app.charts.gender.update();
}

/**
 * Updates level chart with given year
 * @param {string} year Selected year
 */
function updateLevelChart(year) {
  const levelCount = getLevelCount(year);
  app.charts.level.data.datasets.length = 0;
  app.charts.level.data.datasets.push({
    data: [levelCount.levelOne, levelCount.levelTwo],
    backgroundColor: [
      'green',
      'lightgreen',
    ],
  });
  app.charts.level.update();
}

/**
 * Updates type chart with given year
 * @param {string} year Selected year
 */
function updateTypeChart(year) {
  const typeCount = getTypeCount(year);
  app.charts.type.data.datasets.length = 0;
  app.charts.type.data.datasets.push({
    data: [typeCount.FMS, typeCount.GYM, typeCount.HMS, typeCount.IMS, typeCount.PAS],
    backgroundColor: [
      'green',
      'lightgreen',
      'darkgreen',
      'chartreuse',
      'lawngreen',
    ],
  });
  app.charts.type.update();
}

/**
 * Updates country chart with given year
 * @param {string} year Selected year
 */
function updateCountryChart(year) {
  const countries = getCountryCount(year);
  const countryNames = Object.keys(countries);
  const countrySizes = Object.values(countries);
  const colors = [];

  for (let i = 0; i < countrySizes.length; i += 1) {
    colors.push('green');
  }

  app.charts.country.data.datasets.length = 0;
  app.charts.country.data = {
    datasets: [{
      data: countrySizes,
      backgroundColor: colors,
    }],
    labels: countryNames,
  };
  app.charts.country.update();
}

// Get API data and create all charts with default year on page load
document.addEventListener('DOMContentLoaded', async () => {
  // Get JSON from API and add it to global app data
  app.data = await getJSONfromAPI();

  // Set page language
  app.lang = document.documentElement.getAttribute('lang');

  // Check if URL contains valid year
  const hashYear = window.location.hash.replace('#', '');
  if (Object.keys(app.data.years).indexOf(hashYear) > -1) {
    // Set select to year
    yearSelect.value = hashYear;
  }

  // Get the currently selected year
  const year = yearSelect.value;

  // Create charts and add reference to global charts array
  app.charts.gender = createGenderChart(year);
  app.charts.level = createLevelChart(year);
  app.charts.type = createTypeChart(year);
  app.charts.country = createCountryChart(year);
});

// Update all charts on year selection change
yearSelect.addEventListener('change', (event) => {
  // set selected year to url hash
  window.location.hash = event.target.value;

  updateGenderChart(event.target.value);
  updateLevelChart(event.target.value);
  updateTypeChart(event.target.value);
  updateCountryChart(event.target.value);
});
