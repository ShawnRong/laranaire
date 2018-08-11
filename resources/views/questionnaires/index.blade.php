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
                <tr>
                  <th>{{ $index + 1 }}</th>
                  <td>
                      <a href="{{ $questionnaire->link() }}">
                          {{ $questionnaire->title }}
                      </a>
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
                        {{ $questionnaire->identify_id }}
                  </td>
                  <td>
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
