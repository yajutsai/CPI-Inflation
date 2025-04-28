import pandas as pd
import os

# Get the directory where the script is located
script_dir = os.path.dirname(os.path.abspath(__file__))

# Read the data file using the correct path
df = pd.read_csv(os.path.join(script_dir, 'CPI_original.Current'), sep='\t')  # Assuming tab-separated values

# Filter for years between 2015 and 2025
df_filtered = df[(df['year'] >= 2015) & (df['year'] <= 2025)]

# Save to CSV in the same directory
output_path = os.path.join(script_dir, 'CPI_15-25.csv')
df_filtered.to_csv(output_path, index=False)

print(f"Data filtered and saved to {output_path}")
print(f"Number of rows in filtered data: {len(df_filtered)}") 