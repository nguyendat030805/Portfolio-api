local_branch_name="$(git rev-parse --abbrev-ref HEAD)"
valid_branch_regex="^(feat|fix|docs|hotfix)\/.*"

if [[ ! $local_branch_name =~ $valid_branch_regex ]]; then
    echo "❌ Tên nhánh '$local_branch_name' sai cấu trúc (Phải là feat/, fix/...)"
    exit 1
fi