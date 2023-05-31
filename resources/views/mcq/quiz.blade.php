<h1>hello</h1>

<form action="{{route('quiz.submit')}}" method="POST">
    @csrf
    @foreach($questions as $question)
    <div class="question">
        {{-- get the question --}}
        <h2>{{ $question->question_name }}</h2>
        <input type= "text" name = "front_end_quest_id{{$question->id}}" value="{{$question->id}}">
        
      

        {{-- get the corresponding answer for the question --}}

        @foreach($question->answers->shuffle() as $answer)
            {{-- {{dd($question->id);}} --}}
            <div class="option">

                                {{-- <input type="radio" class= "quest" name="answer_option{{$question->id}}" value="{{$answer->id}}" onclick="radioClick(this.value, --}}
                                {{-- php  --}}
                                {{-- // echo $question->id --}}
                                {{-- close php --}}
                                {{-- )" @if(session('answer.'.$question->id) == $answer->id) checked @endif>  --}}


                <input type="radio" class= "quest" name="answer_option{{$question->id}}" value="{{$answer->id}}">
                
                <label>{{ $answer->answer_option }}</label>
            </div>
        @endforeach
    </div>
    <hr>
@endforeach
{{-- @if  --}}

<button type="submit">Validate</button>

{{-- @endif --}}

</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            var checkedRadio = $('input[type="radio"]:checked');
            var number_of_questions = $('.question').length;
            
            // var names = "answer_option{{ $question->id }}"
            // alert (names);
            //get the number of radio option groups
            // var groupsCount =0;
            // var groups = [];
            // var number_of_radio_groups =$('input[type="radio"]');

            // // $number_of_radio_groups.each(function() {
            // var groupName = $(this).attr('answer_option{{ $question->id }}');
            // // alert('he');
                
            //     if (!groups.includes(groupName)) {
            //     groups.push(groupName);
            //     groupsCount++;
            //     console.log(groupName);
            //     }
            // // });


            // alert(groupsCount);
        
            if (checkedRadio.length !== number_of_questions) {
                event.preventDefault(); // Prevent form submission
                alert('Please attempt all questions before submitting.');
            }
        });
    });
</script>



{{-- <div class="pagination"> --}}
    {{-- <button type="submit">Next</button> --}}
    {{-- <div> --}}
    {{-- {{ $questions->links() }} --}}
{{-- </div> --}}


{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    
    
    function radioClick(answer,question){

        //get the options i have selected
        //store the options in a session 
        //retrieve the data from the session 
        // use an if statement to check if it id of the question is there 
        //if its there, look for the checked answeer id using the id of the answers


        // console.log(radio);
        var formData = {
            answer:answer,
            question:question
        }
        sessionStorage.setItem('formdata', JSON.stringify(formData));

        var storedFormData = sessionStorage.getItem('formdata');
        if (storedFormData) {
        // parse the stored form data as an object
        var formData = JSON.parse(storedFormData);

        // access the answer and question values from the formData object
        var answer = formData.answer;
        var question = formData.question;

        console.log(formData.answer)  

        //store the options in a session

        $.ajax({
            type: 'POST',
            url: '{{ route("save_answer") }}',
            data: {
                question_id:formData.question ,
                answer_id:formdata.answer
            },
            success: function(data) {
                console.log('Answer saved successfully');
            }
        });
        sessionstorage.
        // console.log(sessionStorage.getItem('formdata').JSON.parse(storedFormData).formData.answer)
        }
    }

</script> --}}

{{-- {{ @foreach(session()->all() as $key => $value)
<p> $key :  $value </p>
@endforeach ;}} --}}


{{-- {{$value = session('formdata');}} --}}
{{-- {{dd($value);}} --}}