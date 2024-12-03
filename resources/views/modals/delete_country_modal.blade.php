<div class="modal fade" id="delete-country-{{ $country->id }}">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-danger">
          <div class="modal-header border-danger">
              <h3 class="h5 modal-title text-danger">
                  <i class="fa-solid fa-circle-exclamation"></i> 国データを削除する
              </h3>
          </div>
          <div class="modal-body">
              <p>本当に "{{  $country->country_name }}" のデータを削除しますか？</p>
          </div>
          <div class="modal-footer border-0">
              <form action="{{ route('countries.destroy', $country->id) }}" method="post">
                  @csrf
                  @method('DELETE')

                  <button type="button" class="btn btn-outline-danger btn-sm w-5 me-3" data-bs-dismiss="modal">キャンセル</button>
                  <button type="submit" class="btn btn-danger btn-sm w-5">削除</button>
              </form>
          </div>
      </div>
  </div>
</div>