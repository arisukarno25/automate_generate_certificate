<script>
   
      $.ajax({
      url: 'http://192.168.18.65:8056/items/registration?fields=customer_id.id,customer_id.name,session_id.start_time,session_id.session_desc,validated_on&filter[customer_id]=11&filter[validated_on][_between];=["2021-01-1", "2021-12-12"]',
      type: 'GET',
      dataType: 'json',
      success: function (data, textStatus, xhr) {
        $('#name').append(`<h4 class="card-text" style="text-align:left;">${data.data[0].customer_id.name}</h4>`)
        data.data.map(item => {
            $('#webinar').append(`<p class="card-text" style="text-align:left; font-weight: 450; line-height: 50%">${item.session_id.start_time.split('T')[0]} 
            <a style="margin-left: 10px; font-weight: 450">${item.session_id.session_desc}</a></p>`)

            $('#workshop').append(`<p class="card-text" style="text-align:left; font-weight: 450; line-height: 50%">${item.session_id.start_time.split('T')[0]} 
            <a style="margin-left: 10px; font-weight: 450">${item.session_id.session_desc}</a></p> `)
        })
      },
      error: function (xhr, textStatus, errorThrown) {
        console.log('Error in Database');
      }
    });
      
</script>