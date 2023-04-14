<h1>hello</h1>


@foreach($questions as $question)
    <div class="question">
        <h2>{{ $question->question_name }}</h2>
        {{-- {{dd($question->answers);}} --}}
        @foreach($question->answers->shuffle() as $answer)
            {{-- {{dd($question->id);}} --}}
            <div class="option">
                <input type="radio" name="answer_option{{$question->id}}" value="{{$answer->id}}" onclick="radioClick(this.value, <?php echo $question->id?>)" @if(session('answer.'.$question->id) == $answer->id) checked @endif>
                <label>{{ $answer->answer_option }}</label>
            </div>
        @endforeach
    </div>
    <hr>
@endforeach
{{-- <div class="pagination"> --}}
    {{-- <button type="submit">Next</button> --}}
    <div>
    {{ $questions->links() }}
</div>
<button type="submit">Next</button>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    
    
    function radioClick(answer,question){

        //get the options i have selectedd 
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

</script>

{{-- {{ @foreach(session()->all() as $key => $value)
<p> $key :  $value </p>
@endforeach ;}} --}}


{{$value = session('formdata');}}
{{dd($value);}}