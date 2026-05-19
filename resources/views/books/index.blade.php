<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書メモ一覧</title>
        <style>
            body {
                margin: 0;
                background: #f6f7f9;
                color: #1f2937;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            }

            .page {
                max-width: 1040px;
                margin: 0 auto;
                padding: 40px 24px;
            }

            .header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                margin-bottom: 24px;
            }

            h1 {
                margin: 0;
                font-size: 28px;
                font-weight: 700;
            }

            .count {
                color: #64748b;
                font-size: 14px;
            }

            .table-wrap {
                overflow-x: auto;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                min-width: 760px;
            }

            th,
            td {
                padding: 14px 16px;
                border-bottom: 1px solid #e5e7eb;
                text-align: left;
                vertical-align: top;
            }

            th {
                background: #f9fafb;
                color: #475569;
                font-size: 13px;
                font-weight: 700;
            }

            tr:last-child td {
                border-bottom: 0;
            }

            .title {
                font-weight: 700;
            }

            .date {
                white-space: nowrap;
            }

            .text {
                line-height: 1.6;
            }

            .muted {
                color: #94a3b8;
            }

            .empty {
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 32px;
                color: #64748b;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <main class="page">
            <div class="header">
                <h1>読書メモ一覧</h1>
                <div class="count">{{ $books->count() }} 件</div>
            </div>

            @if ($books->isEmpty())
                <div class="empty">まだ読書メモが登録されていません。</div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>読んだ日付</th>
                                <th>要約</th>
                                <th>感想</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="title">{{ $book->title }}</td>
                                    <td class="date">{{ $book->date->format('Y/m/d') }}</td>
                                    <td class="text">
                                        {{ $book->summary ?: '未入力' }}
                                    </td>
                                    <td class="text">
                                        {{ $book->memo ?: '未入力' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>
    </body>
</html>
