@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <table class="table">
            <thead>
              <tr>
                  <th>#</th>
                  <th>标题</th>
                  <th>查看人数</th>
                  <th>填写人数</th>
                  <th>创建时间</th>
                  <th>上次更新时间</th>
                  <th>分享链接</th>
                  <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($questionnaires as $index=>$questionnaire)
                <!-- Modal -->
                <div class="modal fade" id="qrcode-{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">二维码</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ $questionnaire->formQrcode() }}">
                            </div>
                        </div>
                    </div>
                </div>
                <tr>
                  <th>{{ $index + 1 }}</th>
                  <td>
                     {{ $questionnaire->title }}
                  </td>
                  <td>
                    {{ $questionnaire->view_count }}
                  </td>
                  <td>
                    {{ $questionnaire->reply_count }}
                  </td>
                  <td>
                      {{ $questionnaire->created_at->diffForHumans() }}
                  </td>
                  <td>
                      {{ $questionnaire->updated_at->diffForHumans() }}
                  </td>
                  <td>
                    <button class="link-title btn" data-clipboard-text="{{ $questionnaire->formLink() }}" data-toggle="tooltip" data-placement="top" title="{{ $questionnaire->formLink() }}">复制链接</button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#qrcode-{{$index}}">
                        二维码
                    </button>
                    <a class="btn btn-primary" href="{{ $questionnaire->link() }}">编辑</a>
                    <a class="btn btn-info" href="{{ $questionnaire->detailLink() }}">详情</a>
                    {{--<a class="btn btn-info" href="{{ route('questionnaire.statics', $questionnaire) }}">statics</a>--}}
                    @can('delete', $questionnaire)
                      <a class="btn btn-danger" href="{{ route('questionnaire.destroy', $questionnaire) }}" onclick="event.preventDefault();
                      document.getElementById('form-delete').submit();">删除</a>
                      <form action="{{ route('questionnaire.destroy', $questionnaire) }}" id="form-delete" method="POST" style="display: none;">
                          @csrf
                          {{ method_field('DELETE') }}
                      </form>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        {{ $questionnaires->links() }}
    </div>
  <ul>
  </ul>
@endsection
