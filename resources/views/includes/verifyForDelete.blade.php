 {{-- _________Verify Do You Want To Delete This Question________ --}}
                                            <div class="modal fade Verify_Delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                     <div class="modal-header">
                                                                        <h2 class="modal-title" id="staticBackdropLabel"> Are You Sure To Delete !?</h2>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                        <h3>  If click Agree The {{$title}} Will be Delete Immediately </h3>
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                         <form method="POST" action="{{route('questions.destroy',$question)}}">
                                                                             @csrf
                                                                             @method('DELETE')
                                                                             <button type="submit" class="btn btn-danger">Agree</button>
                                                                          </form>
                                                                         <button type="button" class="Xclose btn btn-secondary" data-bs-dismiss="modal">Close</button>              
                                                                     </div>
                                                        </div>
                                                </div>
                                            </div>
                            {{-- _____End_Verify_Delete_____ --}}