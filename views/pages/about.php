<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
        Activities
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link rel="stylesheet" href="../../styles/tailwind.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
<div class="max-w-7xl mx-auto p-4">
    <!-- Header -->
    <div class="flex justify-between items-center py-4">
        <div class="flex items-center space-x-4">
            <img alt="Logo" class="h-10" height="40" src="https://storage.googleapis.com/a1aa/image/cflfTPQ8VtiRikxMFCekpK2LQbj39kj7uMHrpSwLHrPiy0xnA.jpg" width="100"/>
            <div class="flex items-center space-x-2">
                <span class="font-semibold">Bagus Fikri</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="flex items-center space-x-2">
                <span class="font-semibold">Fikri Shop</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <button class="bg-gray-200 p-2 rounded-full">
                <i class="fas fa-search"></i>
            </button>
            <button class="bg-gray-200 p-2 rounded-full">
                <i class="fas fa-bell"></i>
            </button>
            <button class="bg-gray-200 p-2 rounded-full">
                <i class="fas fa-user"></i>
            </button>
            <div class="flex items-center space-x-2">
                <span>Pro Mode</span>
                <input class="toggle-checkbox" type="checkbox"/>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-full">Create</button>
        </div>
    </div>
    <!-- Navigation -->
    <div class="flex space-x-4 py-4">
        <a class="text-gray-600" href="#">Overview</a>
        <a class="text-gray-600" href="#">Arto+</a>
        <a class="text-gray-600 font-semibold" href="#">Activities</a>
        <a class="text-gray-600" href="#">Products</a>
        <a class="text-gray-600" href="#">Billing</a>
        <a class="text-gray-600" href="#">People</a>
        <a class="text-gray-600" href="#">Report</a>
    </div>
    <!-- Main Content -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Activities</h1>
            <a class="text-blue-600" href="#">View your full analytics View Report</a>
        </div>
        <!-- Filters -->
        <div class="flex space-x-4 mb-4">
            <button class="bg-gray-200 px-4 py-2 rounded-full">Last 7 days</button>
            <button class="bg-gray-200 px-4 py-2 rounded-full">15 Mar - 22 Mar</button>
            <button class="bg-gray-200 px-4 py-2 rounded-full">All 35</button>
            <button class="bg-gray-200 px-4 py-2 rounded-full">Received 15</button>
            <button class="bg-gray-200 px-4 py-2 rounded-full">Sent 5</button>
            <button class="bg-gray-200 px-4 py-2 rounded-full">Convert 10</button>
            <button class="bg-gray-200 px-4 py-2 rounded-full">Currency</button>
        </div>
        <!-- Search -->
        <div class="flex justify-between items-center mb-4">
            <input class="bg-gray-200 px-4 py-2 rounded-full w-full" placeholder="Search" type="text"/>
        </div>
        <!-- Table -->
        <table class="w-full text-left">
            <thead>
            <tr class="text-gray-600">
                <th class="py-2">TYPE</th>
                <th class="py-2">AMOUNT</th>
                <th class="py-2">PAYMENT METHOD</th>
                <th class="py-2">STATUS</th>
                <th class="py-2">ACTIVITY</th>
                <th class="py-2">PEOPLE</th>
                <th class="py-2">DATE</th>
            </tr>
            </thead>
            <tbody id="table-body" class="text-gray-800">
            <!-- Rows will be inserted here by JavaScript -->
            </tbody>
        </table>
        <div class="text-center py-4">
            <a class="text-blue-600" href="#">Load More</a>
        </div>
    </div>
</div>
<script>
    const data = [
        {
            type: "Sent",
            amount: "- 500.00 IDR",
            paymentMethod: "Credit Card **** 6969",
            status: "Success",
            activity: "Sending money to Raihan Fikri",
            person: {name: "Raihan Zuhlimin", img: "https://storage.googleapis.com/a1aa/image/6FjDqrHjE3qaC1kTeCZA2MbwRbKwXj2cAee3EIF7I9Hqy0xnA.jpg"},
            date: "Aug 28, 2023 3:40 PM"
        },
        {
            type: "Sent",
            amount: "- 200.00 IDR",
            paymentMethod: "Wire Transfer **** 9830",
            status: "Success",
            activity: "Sending money to Bani Zuhlimin",
            person: {name: "Bani Zuhlimin", img: "https://storage.googleapis.com/a1aa/image/h5CgI2X3Bj7RCZeDdE0nBezzbEY20aq3nPcV3BjBfwyekpjPB.jpg"},
            date: "Aug 28, 2023 3:40 PM"
        },
        {
            type: "Received",
            amount: "+ 1.500 USD",
            paymentMethod: "Bank Transfer **** 6663",
            status: "Success",
            activity: "Received money from Andrew",
            person: {name: "Andrew Top G", img: "https://storage.googleapis.com/a1aa/image/xA0nU0X22jICAVWd6XvxAYxKxL5pbiDZ5y9oeieoZHxQZ64TA.jpg"},
            date: "Aug 28, 2023 3:40 PM"
        },
        {
            type: "Received",
            amount: "+ 2.500 USD",
            paymentMethod: "PayPal @claristaj",
            status: "Success",
            activity: "Payment for product",
            person: {name: "Clarista Jawl", img: "https://storage.googleapis.com/a1aa/image/GEwvTU82eRwbH6GERiUUmQCKDxXaMpDNQatLgY74AKXtMd8JA.jpg"},
            date: "Aug 28, 2023 3:40 PM"
        },
        {
            type: "Received",
            amount: "+ 1.500 USD",
            paymentMethod: "Payoneer **** 1083",
            status: "Incomplete",
            activity: "Payment for invoice",
            person: {name: "Andrew Top G", img: "https://storage.googleapis.com/a1aa/image/xYaSCi7TniJnIBeefw7prewsYB4ZtZqftgDOFPN3N43bKTHfE.jpg"},
            date: "Aug 27, 2023 5:30 PM"
        },
        {
            type: "Converted",
            amount: "400.000 IDR",
            paymentMethod: "Debit Card **** 2833",
            status: "Failed",
            activity: "Convert money from USD to IDR",
            person: {name: "Bagus Fikri", img: "https://storage.googleapis.com/a1aa/image/jCfzoUAfx1hzeJOflu4qI9buyijtlUI0pIfAm1q4UKWhLTHfE.jpg"},
            date: "Aug 27, 2023 3:35 PM"
        },
        {
            type: "Received",
            amount: "+ 500 USD",
            paymentMethod: "Credit Card **** 3298",
            status: "Success",
            activity: "Received money from Bani Zuhlimin",
            person: {name: "Bani Zuhlimin", img: "https://storage.googleapis.com/a1aa/image/HjwuFvWjpDqUFhF17Ezu9xkJUnOHFWyl3pJoUBWRWpVTmOeJA.jpg"},
            date: "Aug 27, 2023 2:15 PM"
        },
        {
            type: "Received",
            amount: "+ 1.000 IDR",
            paymentMethod: "PayPal @BasilusKelvin",
            status: "Success",
            activity: "Received money from Basilus Kelvin",
            person: {name: "Basilus Kelvin", img: "https://storage.googleapis.com/a1aa/image/rjatYzudffmnDk6jK1QmHm8tiIKxjqeJJhUYOK1kjkJpy0xnA.jpg"},
            date: "Aug 27, 2023 11:10 AM"
        },
        {
            type: "Sent",
            amount: "- 1.500.000 IDR",
            paymentMethod: "Wire Transfer **** 2334",
            status: "Failed",
            activity: "Sending money to Raihan Fikri",
            person: {name: "Raihan Zuhlimin", img: "https://storage.googleapis.com/a1aa/image/QG3LFrELsWLrINef7tWhfNyMKtJGGTF7H1ae2N51Q1e5KTHfE.jpg"},
            date: "Aug 27, 2023 09:40 AM"
        },
        {
            type: "Converted",
            amount: "500.000 IDR",
            paymentMethod: "Credit Card **** 3298",
            status: "Success",
            activity: "Convert money from USD to IDR",
            person: {name: "Bagus Fikri", img: "https://storage.googleapis.com/a1aa/image/0tvcqqdEnpZeQ6ZLivNigsaXWtb5IagOHzNJefOLrGywy0xnA.jpg"},
            date: "Aug 26, 2023 04:45 PM"
        }
    ];

    const tableBody = document.getElementById('table-body');

    data.forEach(item => {
        const row = document.createElement('tr');
        row.classList.add('border-t');

        row.innerHTML = `
            <td class="py-2"><i class="fas fa-arrow-${item.type === 'Sent' ? 'up text-red-500' : item.type === 'Received' ? 'down text-green-500' : 'exchange-alt text-blue-500'}"></i> ${item.type}</td>
            <td class="py-2">${item.amount}</td>
            <td class="py-2">${item.paymentMethod}</td>
            <td class="py-2 ${item.status === 'Success' ? 'text-green-500' : item.status === 'Incomplete' ? 'text-yellow-500' : 'text-red-500'}"><i class="fas fa-${item.status === 'Success' ? 'check-circle' : item.status === 'Incomplete' ? 'exclamation-circle' : 'times-circle'}"></i> ${item.status}</td>
            <td class="py-2">${item.activity}</td>
            <td class="py-2 flex items-center"><img alt="${item.person.name}" class="rounded-full h-8 w-8 mr-2" height="30" src="${item.person.img}" width="30"/> ${item.person.name}</td>
            <td class="py-2">${item.date}</td>
        `;

        tableBody.appendChild(row);
    });
</script>
</body>
</html>



