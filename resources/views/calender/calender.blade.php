<style>
    .calendar {
        width: 300px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }

    .day {
        border: 1px solid #ccc;
        padding: 5px;
        cursor: pointer;
    }

    .day:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="calendar">
    <div class="header">
        <button id="prevMonth">&lt;</button>
        <h2 id="monthYear">{{ $currentDate->format('F Y') }}</h2>
        <button id="nextMonth">&gt;</button>
    </div>
    <div class="days">
        @foreach ($calendarDates as $date)
            <div class="day" data-date="{{ $date->format('Y-m-d') }}">{{ $date->format('j') }}</div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let currentDate = '{{ $currentDate->format('Y-m-d') }}';
            let monthYearElement = $('#monthYear');

            $('#prevMonth').click(function() {
                changeMonth(-1);
            });

            $('#nextMonth').click(function() {
                changeMonth(1);
            });

            function changeMonth(change) {
                let newDate = new Date(currentDate);
                newDate.setMonth(newDate.getMonth() + change);

                currentDate = newDate.toISOString().slice(0, 10);
                monthYearElement.text(newDate.toLocaleString('default', { month: 'long', year: 'numeric' }));
            }
        });
    </script>
@endpush
