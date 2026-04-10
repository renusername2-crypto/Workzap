@extends('layouts.employer')

@section('title', 'Interview Scheduling')

@section('content')
<div class="interviews-section">
    <div class="interviews-header">
        <div>
            <h1>Interview scheduling</h1>
            <p>Manage all scheduled interviews</p>
        </div>
        <button class="btn btn-primary">+ Schedule interview</button>
    </div>

    <!-- View Toggle -->
    <div class="view-toggle">
        <button class="toggle-btn active" onclick="showCalendar()">Calendar view</button>
        <button class="toggle-btn" onclick="showList()">List view</button>
    </div>

    <!-- Calendar View -->
    <div class="calendar-view" id="calendarView">
        <div class="calendar-wrapper">
            <div class="calendar">
                <div class="calendar-header">
                    <button>&lt;</button>
                    <select>
                        <option>Sep</option>
                        <option>Oct</option>
                    </select>
                    <select>
                        <option>2025</option>
                        <option>2026</option>
                    </select>
                    <button>&gt;</button>
                </div>

                <div class="calendar-grid">
                    <div>Su</div>
                    <div>Mo</div>
                    <div>Tu</div>
                    <div>We</div>
                    <div>Th</div>
                    <div>Fr</div>
                    <div>Sa</div>
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                    <div>6</div>
                    <div>7</div>
                    <div>8</div>
                    <div class="active">9</div>
                    <div>10</div>
                    <div>11</div>
                    <div>12</div>
                    <div class="active">13</div>
                    <div>14</div>
                    <div>15</div>
                    <div>16</div>
                    <div>17</div>
                    <div>18</div>
                    <div>19</div>
                    <div>20</div>
                    <div>21</div>
                    <div>22</div>
                    <div>23</div>
                    <div>24</div>
                    <div>25</div>
                    <div>26</div>
                    <div>27</div>
                    <div>28</div>
                </div>
            </div>

            <!-- Today's Interviews -->
            <div class="today-interviews">
                <h3>Today — March 23</h3>
                <div class="interview-item">
                    <div class="status-badge" style="background: #d4edda;"></div>
                    <div>
                        <strong>Ben Torres</strong><br>
                        Warehouse Staff<br>
                        <span>9:00 AM — 9:30 AM</span>
                    </div>
                    <span class="badge badge-confirmed">Confirmed</span>
                </div>

                <div class="interview-item">
                    <div class="status-badge" style="background: #fff3cd;"></div>
                    <div>
                        <strong>Maria Reyes</strong><br>
                        Sales Associate<br>
                        <span>2:00 PM — 2:30 PM</span>
                    </div>
                    <span class="badge badge-pending">Pending</span>
                </div>

                <div class="interview-item">
                    <div class="status-badge" style="background: #d4edda;"></div>
                    <div>
                        <strong>Rico Cruz</strong><br>
                        Driver<br>
                        <span>4:00 PM — 4:30 PM</span>
                    </div>
                    <span class="badge badge-confirmed">Confirmed</span>
                </div>
            </div>
        </div>

        <!-- Upcoming -->
        <div class="upcoming-section">
            <h3>Upcoming</h3>
            <div class="upcoming-item">
                <strong>Jose Santos</strong><br>
                Mar 24 · 10:00 AM<br>
                <span class="badge badge-confirmed">Confirmed</span>
            </div>
            <div class="upcoming-item">
                <strong>Ana Lim</strong><br>
                Mar 26 · 1:00 PM<br>
                <span class="badge badge-pending">Pending</span>
            </div>
        </div>
    </div>

    <!-- List View (hidden by default) -->
    <div class="list-view" id="listView" style="display: none;">
        <table class="interviews-table">
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Position</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Maria Reyes</td>
                    <td>Sales Associate</td>
                    <td>Mar 23, 2026 2:00 PM</td>
                    <td><span class="badge badge-pending">Pending</span></td>
                    <td>
                        <button class="btn btn-outline">Edit</button>
                        <button class="btn btn-danger">Cancel</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function showCalendar() {
        document.getElementById('calendarView').style.display = 'block';
        document.getElementById('listView').style.display = 'none';
    }

    function showList() {
        document.getElementById('calendarView').style.display = 'none';
        document.getElementById('listView').style.display = 'block';
    }
</script>
@endsection