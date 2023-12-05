function openPopup() {
    document.getElementById('popup').style.display = 'block';
    // Add code to generate the circle chart here
    const users = [
        { role_ut: 'admin' },
        { role_ut: 'coach' },
        { role_ut: 'client' }
    ];
    const percentages = calculatePercentages(users.map(user => user.role_ut));
    createPieChart(percentages, 'chart-container');
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

function calculatePercentages(roles) {
    const totalRoles = roles.length;
    const types = {
        admin: 0,
        coach: 0,
        client: 0,
    };

    roles.forEach((role_ut) => {
        types[role_ut.toLowerCase()]++;
    });

    const percentages = Object.entries(types).map(([role_ut, count]) => {
        return {
            name: role_ut,
            value: (count / totalRoles) * 100,
        };
    });

    return percentages;
}

function createPieChart(percentages, containerId) {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = Math.min(centerX, centerY);

    canvas.width = 300; // Set the width of the canvas
    canvas.height = 300; // Set the height of the canvas

    let startAngle = 0;

    percentages.forEach((percentage) => {
        const endAngle = (percentage.value / 100) * (2 * Math.PI) + startAngle;
        const middleAngle = startAngle + (endAngle - startAngle) / 2;

        console.log('startAngle:', startAngle);
        console.log('endAngle:', endAngle);

        // Calculate the position for the text
        const textX = centerX + Math.cos(middleAngle) * (radius / 2);
        const textY = centerY + Math.sin(middleAngle) * (radius / 2);

        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.fillStyle = getRandomColor(); // Define a function to generate random colors
        ctx.fill();

        // Draw the percentage text
        ctx.fillStyle = '#fff'; // Set the text color to white
        ctx.font = '12px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(`${percentage.name}: ${percentage.value.toFixed(2)}%`, textX, textY);

        startAngle = endAngle;
    });

    // Append the canvas to the specified container
    document.getElementById(containerId).appendChild(canvas);
}

// Function to generate a random color
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}