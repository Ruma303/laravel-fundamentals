<h1>Vista Customers</h1>
<p>Lista dei clienti</p>
<ul><?php foreach($customers as $customer)
        echo "<li> $customer </li>" ?></ul>
<a href={{ route('admin.dashboard') }}>Dashboard</a>
<a href={{ route('admin.staff') }}>Staff view</a>
