/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

import Chart from '../js/Chart.esm.js';

// Global app state
const app = {
  data: {}, // JSON data from the API
  charts: [], // Reference to all charts
};

// Year selection dropdown
const yearSelect = document.getElementsByClassName('year-select')[0];

/**
 * Gets JSON data from API
 */
async function getJSONfromAPI() {
  const request = await fetch('/api.php', { method: 'GET' });
  const json = await request.json();
  return json;
}

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
    // Students only contains an index to string in gender array
    const gender = app.data.genders[student.gender];
    switch (gender) {
      case 'männlich':
        maleCount += 1;
        break;

      case 'weiblich':
        femaleCount += 1;
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

function getLevelCount(year) {
  const students = app.data.years[year];
  let levelOneCount = 0;
  let levelTwoCount = 0;

  students.forEach((student) => {
    const level = app.data.levels[student.level];
    switch (level) {
      case 'Sekundarstufe I':
        levelOneCount += 1;
        break;

      case 'Sekundarstufe II':
        levelTwoCount += 1;
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
 * Creates gender chart and adds it to page
 * @param {string} year Selected year
 * @returns {Chart}
 */
function createGenderChart(year) {
  const canvas = document.getElementsByClassName('gender-chart')[0];
  const genderCount = getGenderCount(year);
  const chart = new Chart(canvas.getContext('2d'), {
    type: 'pie',
    data: {
      datasets: [{
        data: [genderCount.male, genderCount.female],
        backgroundColor: [
          'blue',
          'pink',
        ],
      }],
      labels: [
        'Männlich',
        'Weiblich',
      ],
    },
  });

  return chart;
}

function createLevelChart(year) {
  const canvas = document.getElementsByClassName('level-chart')[0];
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
      labels: [
        'Sekundarstufe I',
        'Sekundarstufe II',
      ],
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
    data: [genderCount.male, genderCount.female],
    backgroundColor: [
      'blue',
      'pink',
    ],
  });
  app.charts.gender.update();
}

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

// Get API data and create all charts with default year on page load
document.addEventListener('DOMContentLoaded', async () => {
  // Get JSON from API and add it to global app data
  app.data = await getJSONfromAPI();

  // Get the currently selected year
  const year = yearSelect.value;

  // Create charts and add reference to global charts array
  app.charts.gender = createGenderChart(year);
  app.charts.level = createLevelChart(year);
});


// Update all charts on year selection change
yearSelect.addEventListener('change', async (event) => {
  updateGenderChart(event.target.value);
  updateLevelChart(event.target.value);
});