<html lang="en">
<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @foreach($accessTickets as $index => $ticket)
        <div class="container mx-auto mt-8">
            <div class="mx-auto max-w-md rounded-lg bg-white p-8 shadow-md">
                <div class="text-center">
                    <h1 class="text-3xl font-bold">{{ $event->name }}</h1>
                    <h3 class="text-xl font-bold">{{ __('Transaction Id') }}: {{ $ticket->transaction->id}}</h3>
                    <div class="mt-4 flex flex-row items-center justify-between">
                        <p class="text-gray-600">{{ $event->start_date->format('Y-m-d') }}</p>
                        <p class="text-gray-600">-</p>
                        <p class="text-gray-600">{{ $event->end_date->format('Y-m-d') }}</p>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-200 pt-8">
                    <div class="flex justify-between">
                        <p class="text-gray-600">{{ __('Name') }}</p>
                        <p class="font-bold">{{ $ticket->name }}</p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <p class="text-gray-600">{{ __('Email') }}</p>
                        <p class="font-bold">{{ $ticket->email }}</p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <p class="text-gray-600">{{ __('Price') }}</p>
                        <p class="font-bold">{{ $ticket->price }}</p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <p class="text-gray-600">{{ __('Venue') }}</p>
                        <p class="font-bold">{{ $event->venue->name }}</p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <p class="text-gray-600">{{ __('Venue Address') }}</p>
                        <p class="font-bold">{{ $event->venue->address }}</p>
                    </div>
                    @if($ticket->eventSessionTicket->eventSession->description != null)
                        <div class="mt-4 flex justify-between">
                            <p class="text-gray-600">{{ __('Session description') }}</p>
                            <p class="font-bold">{{ $ticket->eventSessionTicket->eventSession->description }}</p>
                        </div>
                    @endif
                    <div class="mt-8 flex justify-center">
                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(180)->generate($ticket->qr_code_url); !!}
                    </div>
                </div>
            </div>
        </div>
        @if($index < count($accessTickets) - 1 || $index == count($accessTickets))
            @pageBreak
        @endif
    @endforeach
</body>
</html>
