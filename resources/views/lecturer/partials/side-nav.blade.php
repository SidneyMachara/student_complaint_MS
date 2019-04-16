<ul class="list-group mt-5 side-nav-ul">
  <li class="list-group-item border-0"  >
    <a href="{{ route('lecturer.complaints') }}" class="{{ isActiveRouteA(['lecturer.complaints']) }}"><i class="fa fa-question mr-2"></i>All Complaints</a>
  </li>
  <li class="list-group-item border-0">
    <a href="{{ route('lecturer.unsolvedComplaints') }}" class="{{ isActiveRouteA(['lecturer.unsolvedComplaints']) }}"><i class="fa fa-times mr-2"></i>Unsolved Complaints</a>
  </li>
  <li class="list-group-item border-0">
    <a href="{{ route('lecturer.solvedComplaints') }}" class="{{ isActiveRouteA(['lecturer.solvedComplaints']) }}"><i class="fa fa-check-circle mr-2"></i>Solved Complaints</a>
  </li>
</ul>
