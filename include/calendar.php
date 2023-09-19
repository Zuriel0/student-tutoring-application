<!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>  -->


<div class="modal fade" style="--bs-modal-width: 900px;" id="exampleModal" tabindex="-1"  aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="height: 93vh">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="calendar" > 
        <!-- <div id="calendar"></div> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>  
        
<script>
    function reload {
      var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
          });
          setInterval(calendar.render(),1000);
              //calendar.render();
      }
</script>

