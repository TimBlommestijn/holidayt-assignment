<h1>Customers</h1>

<a href="/customers/create">create a customer</a>

@forelse($customers as $customer)
    <p><strong>
            <a href="/customers/{{$customer->id}}">{{ $customer->name }}</a>
        </strong>({{$customer->email}})</p>
@empty
    <p>no customers to show</p>
@endforelse 