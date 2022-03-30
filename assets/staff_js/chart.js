const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
  type: "pie",
  data: {
    labels: ["Boys", "Grils"],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19],
        backgroundColor: [
          " rgba(255, 99, 133, 0.329)",
          "rgba(54, 163, 235, 0.363)",
        ],
        borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)"],
        borderWidth: 1,
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});
