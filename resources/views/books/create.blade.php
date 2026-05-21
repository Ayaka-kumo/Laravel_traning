<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書メモ追加</title>
        <style>
            body {
                margin: 0;
                background: #f6f7f9;
                color: #1f2937;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            }

            .page {
                max-width: 760px;
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

            .back {
                color: #2563eb;
                font-size: 14px;
                font-weight: 700;
                text-decoration: none;
            }

            .form {
                display: grid;
                gap: 18px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 24px;
            }

            .field {
                display: grid;
                gap: 8px;
            }

            label {
                font-size: 14px;
                font-weight: 700;
            }

            .required {
                color: #dc2626;
                font-size: 12px;
            }

            input,
            textarea {
                width: 100%;
                box-sizing: border-box;
                border: 1px solid #cbd5e1;
                border-radius: 6px;
                padding: 10px 12px;
                color: #1f2937;
                font: inherit;
            }

            textarea {
                min-height: 120px;
                resize: vertical;
            }

            input:focus,
            textarea:focus {
                border-color: #2563eb;
                outline: 2px solid #bfdbfe;
            }

            .error {
                color: #dc2626;
                font-size: 13px;
            }

            .button {
                justify-self: start;
                min-height: 42px;
                padding: 0 18px;
                border: 0;
                border-radius: 6px;
                background: #2563eb;
                color: #ffffff;
                font-size: 15px;
                font-weight: 700;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <main class="page">
            <div class="header">
                <h1>読書メモ追加</h1>
                <a href="{{ route('books.index') }}" class="back">一覧へ戻る</a>
            </div>

            <form action="{{ route('books.store') }}" method="post" class="form">
                @csrf

                <div class="field">
                    <label for="title">タイトル <span class="required">必須</span></label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="date">読んだ日付 <span class="required">必須</span></label>
                    <input id="date" type="date" name="date" value="{{ old('date') }}">
                    @error('date')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="summary">要約</label>
                    <textarea id="summary" name="summary">{{ old('summary') }}</textarea>
                    @error('summary')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="memo">感想</label>
                    <textarea id="memo" name="memo">{{ old('memo') }}</textarea>
                    @error('memo')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="button">登録する</button>
            </form>
        </main>
    </body>
</html>
