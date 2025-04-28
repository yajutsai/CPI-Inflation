import pandas as pd
import re

def extract_area_code(text):
    # 安全檢查
    if not isinstance(text, str):
        return ''
    # 確保有至少8個字
    if len(text) >= 8:
        area_code = text[4:8]
        # 如果是數字，補0到4位；如果是字母或混合，就直接回傳
        if area_code.isdigit():
            return area_code.zfill(4)  # 保持4位數
        return area_code
    return ''

def extract_item_code(text):
    # 提取剩下的item code
    if not isinstance(text, str):
        return ''
    if len(text) > 8:
        return text[8:]
    return ''

# 讀取CSV時，全部以文字格式讀入（避免科學記號）
df = pd.read_csv('data/series_id.csv', dtype=str)

# 確認第一欄是 series_id（或叫 A）
first_col = df.columns[0]

# 創建新欄位
df['Index type'] = df[first_col].str[:2]
df['Seasonal adjustment status'] = df[first_col].str[2]
df['Periodicity'] = df[first_col].str[3]
df['Area code'] = df[first_col].apply(extract_area_code)
df['Item code'] = df[first_col].apply(extract_item_code)

# 匯出時確保全部是文字，不強制轉浮點數
df.to_csv('data/processed_series_id.csv', index=False, quoting=1)  # quoting=1 表示用引號包起來防止Excel吃掉0

print("✅ 處理完成，結果儲存為 'processed_series_id.csv'")
