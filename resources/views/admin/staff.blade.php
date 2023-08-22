<h1>Vista Staff</h1>
<p>Lista del personale</p>
<ul><?php foreach($employees as $employee)
        echo "<li> $employee </li>";?></ul>

<a href={{ route('admin.dashboard') }}>Dashboard</a>
<a href={{ route('admin.customers') }}>Customer view</a>
