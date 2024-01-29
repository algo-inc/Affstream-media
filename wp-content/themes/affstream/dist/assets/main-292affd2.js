function Ni(t, ...e) {
    const n = t.subscribe(...e);
    return n.unsubscribe ? () => n.unsubscribe() : n
}

function Pt(t) {
    let e;
    return Ni(t, n => e = n)(), e
}

class bi extends Error {
    constructor(e, n) {
        super(e), this.name = "FelteSubmitError", this.response = n
    }
}

function Si(t, e) {
    return Object.keys(t).some(r => e(t[r]))
}

function Qe(t, e) {
    return Object.keys(t || {}).reduce((r, i) => Object.assign(Object.assign({}, r), {[i]: e(t[i])}), {})
}

function _(t) {
    return Object.prototype.toString.call(t) === "[object Object]"
}

function lt(t) {
    return Object.keys(t || {}).reduce((e, n) => Object.assign(Object.assign({}, e), {[n]: _(t[n]) ? lt(t[n]) : Array.isArray(t[n]) ? [...t[n]] : t[n]}), {})
}

function Ai(t, e) {
    var n = {};
    for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && e.indexOf(r) < 0 && (n[r] = t[r]);
    if (t != null && typeof Object.getOwnPropertySymbols == "function") for (var i = 0, r = Object.getOwnPropertySymbols(t); i < r.length; i++) e.indexOf(r[i]) < 0 && Object.prototype.propertyIsEnumerable.call(t, r[i]) && (n[r[i]] = t[r[i]]);
    return n
}

function Ti(t) {
    return function (e) {
        if (_(e)) {
            const n = dt(e, t);
            return Ai(n, ["key"])
        }
        return t
    }
}

function dt(t, e) {
    return Qe(t, n => _(n) ? dt(n, e) : Array.isArray(n) ? n.map(Ti(e)) : e)
}

function zt(...t) {
    const e = t.pop(), n = t.shift();
    if (typeof n == "string") return n;
    const r = lt(n);
    if (t.length === 0) return r;
    for (const i of t) {
        if (!i) continue;
        if (typeof i == "string") return i;
        let s = e(r, i);
        if (typeof s < "u") return s;
        const o = Array.from(new Set(Object.keys(r).concat(Object.keys(i))));
        for (const u of o) if (s = e(r[u], i[u]), typeof s < "u") r[u] = s; else if (_(i[u]) && _(r[u])) r[u] = zt(r[u], i[u], e); else if (Array.isArray(i[u])) r[u] = i[u].map((c, d) => {
            if (!_(c)) return c;
            const h = Array.isArray(r[u]) ? r[u][d] : r[u];
            return zt(h, c, e)
        }); else if (_(i[u])) {
            const c = dt(lt(i[u]), void 0);
            r[u] = zt(c, i[u], e)
        } else typeof i[u] < "u" && (r[u] = i[u])
    }
    return r
}

function _i(t, e) {
    if (!(_(t) && _(e))) {
        if (Array.isArray(e)) {
            if (e.some(_)) return;
            const n = Array.isArray(t) ? t : [];
            return e.map((r, i) => {
                var s;
                return (s = n[i]) !== null && s !== void 0 ? s : r
            })
        }
        if (typeof t < "u") return t
    }
}

function Cn(...t) {
    return zt(...t, _i)
}

function or(...t) {
    return zt(...t, () => {
    })
}

function xt(t, e, n) {
    const r = s => String.prototype.split.call(e, s).filter(Boolean).reduce((o, u) => o != null ? o[u] : o, t),
        i = r(/[,[\]]+?/) || r(/[,[\].]+?/);
    return i === void 0 || i === t ? n : i
}

function We(t, e, n) {
    t && (t = lt(t)), _(t) || (t = {});
    const r = Array.isArray(e) ? e : e.match(/[^.[\]]+/g) || [], i = r[r.length - 1];
    if (!i) return t;
    let s = t;
    for (let o = 0; o < r.length - 1; o++) {
        const u = r[o];
        if (!s[u] || !_(s[u]) && !Array.isArray(s[u])) {
            const c = r[o + 1];
            isNaN(Number(c)) ? s[u] = {} : s[u] = []
        }
        s = s[u]
    }
    return s[i] = n(s[i]), t
}

function w(t, e, n) {
    return We(t, e, () => n)
}

function Ie(t, e) {
    if (!t || Object(t) !== t) return;
    typeof t < "u" && (t = lt(t));
    const n = Array.isArray(e) ? e : e.toString().match(/[^.[\]]+/g) || [],
        r = n.length === 1 ? t : xt(t, n.slice(0, -1).join("."));
    return Array.isArray(r) ? r.splice(Number(n[n.length - 1]), 1) : r == null || delete r[n[n.length - 1]], t
}

function Ce(t, e) {
    return Si(t, n => _(n) ? Ce(n, e) : Array.isArray(n) ? n.length === 0 || n.every(r => typeof r == "string") ? e(n) : n.some(r => _(r) ? Ce(r, e) : e(r)) : e(n))
}

function le(t) {
    return (t == null ? void 0 : t.nodeName) === "INPUT"
}

function Oi(t) {
    return (t == null ? void 0 : t.nodeName) === "TEXTAREA"
}

function de(t) {
    return (t == null ? void 0 : t.nodeName) === "SELECT"
}

function tn(t) {
    return (t == null ? void 0 : t.nodeName) === "FIELDSET"
}

function et(t) {
    return le(t) || Oi(t) || de(t)
}

function Pn(t) {
    return t.nodeType === Node.ELEMENT_NODE
}

function Q(t, e) {
    return e ?? (et(t) ? t.name : "")
}

function on(t) {
    let e = t;
    for (; e && e.nodeName !== "FORM";) {
        if (e.hasAttribute("data-felte-ignore")) return !0;
        e = e.parentElement
    }
    return !1
}

function Ii(t, e) {
    if (!(_(t) || _(e))) {
        if (t === null || t === "") return e;
        if (e === null || e === "" || !e) return t;
        if (!(!t || !e)) {
            if (Array.isArray(t)) {
                if (!Array.isArray(e)) return [...t, e];
                const n = [], r = Math.max(e.length, t.length);
                for (let i = 0; i < r; i++) {
                    let s = t[i], o = e[i];
                    !_(s) && !_(o) ? (Array.isArray(s) || (s = [s]), Array.isArray(o) || (o = [o]), n.push(...s, ...o)) : n.push(ue([s ?? {}, o ?? {}]))
                }
                return n.filter(Boolean)
            }
            return Array.isArray(e) || (e = [e]), [t, ...e].reduce((n, r) => n.concat(r), []).filter(Boolean)
        }
    }
}

function ue(t) {
    return zt(...t, Ii)
}

function Di(t, e) {
    return e ? (Array.isArray(e) ? e : [e]).map(r => r(t)) : []
}

function dn(t, e) {
    return e ? Array.isArray(e) ? e.reduce((n, r) => r(n), t) : e(t) : t
}

function ur(t = 8) {
    const e = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let n = "";
    for (let r = 0; r < t; r++) n += e.charAt(Math.floor(Math.random() * e.length));
    return n
}

function fn(t, e) {
    if (t === e) return !0;
    if (Array.isArray(t) && Array.isArray(e)) return t.length !== e.length ? !1 : t.every((n, r) => fn(n, e[r]));
    if (_(t) && _(e)) {
        const n = Object.keys(t), r = Object.keys(e);
        return n.length !== r.length ? !1 : n.every(i => fn(t[i], e[i]))
    }
    return !1
}

function qe(t, e, {onInit: n, onEnd: r} = {}) {
    let i;
    return (...s) => {
        i || n == null || n(), i && clearTimeout(i), i = setTimeout(() => {
            t.apply(this, s), i = void 0, r == null || r()
        }, e)
    }
}

function mn(t) {
    if (et(t)) return [t];
    if (t.childElementCount === 0) return [];
    const e = new Set;
    for (const n of t.children) {
        if (et(n) && e.add(n), tn(n)) for (const r of n.elements) et(r) && e.add(r);
        n.childElementCount > 0 && mn(n).forEach(r => e.add(r))
    }
    return Array.from(e)
}

function ar(t) {
    for (const e of t.elements) !et(e) && !tn(e) || t.hasAttribute("data-felte-keep-on-remove") && !e.hasAttribute("data-felte-keep-on-remove") && (e.dataset.felteKeepOnRemove = t.dataset.felteKeepOnRemove)
}

function cr(t) {
    return t.type.match(/^(number|range)$/) ? t.value ? +t.value : null : t.value
}

function Ln(t) {
    var e;
    let n = {}, r = {};
    for (const i of t.elements) {
        if (tn(i) && ar(i), !et(i) || !i.name) continue;
        const s = Q(i);
        if (le(i)) {
            if (i.type === "checkbox") {
                if (typeof xt(n, s) > "u") {
                    if (Array.from(t.querySelectorAll(`[name="${i.name}"]`)).filter(c => et(c) ? s === Q(c) : !1).length === 1) {
                        n = w(n, s, i.checked), r = w(r, s, !1);
                        continue
                    }
                    n = w(n, s, i.checked ? [i.value] : []), r = w(r, s, !1);
                    continue
                }
                Array.isArray(xt(n, s)) && i.checked && (n = We(n, s, u => [...u, i.value]));
                continue
            }
            if (i.type === "radio") {
                if (xt(n, s)) continue;
                n = w(n, s, i.checked ? i.value : void 0), r = w(r, s, !1);
                continue
            }
            if (i.type === "file") {
                n = w(n, s, i.multiple ? Array.from(i.files || []) : (e = i.files) === null || e === void 0 ? void 0 : e[0]), r = w(r, s, !1);
                continue
            }
        } else if (de(i)) {
            if (!i.multiple) n = w(n, s, i.value); else {
                const c = Array.from(i.selectedOptions).map(d => d.value);
                n = w(n, s, c)
            }
            r = w(r, s, !1);
            continue
        }
        const o = cr(i);
        n = w(n, s, o), r = w(r, s, !1)
    }
    return {defaultData: n, defaultTouched: r}
}

function Ri(t, e) {
    var n;
    if (!et(t)) return;
    const r = e;
    if (le(t)) {
        if (t.type === "checkbox") {
            const i = r;
            if (typeof i > "u" || typeof i == "boolean") {
                t.checked = !!i;
                return
            }
            Array.isArray(i) && (i.includes(t.value) ? t.checked = !0 : t.checked = !1);
            return
        }
        if (t.type === "radio") {
            const i = r;
            t.value === i ? t.checked = !0 : t.checked = !1;
            return
        }
        if (t.type === "file") {
            if (e instanceof FileList) t.files = e; else if (e instanceof File && typeof DataTransfer < "u") {
                const i = new DataTransfer;
                i.items.add(e), t.files = i.files
            } else if (typeof DataTransfer < "u" && Array.isArray(e) && e.some(i => i instanceof File)) {
                const i = new DataTransfer;
                for (const s of e) s instanceof File && i.items.add(s);
                t.files = i.files
            } else (!e || Array.isArray(e) && !e.length) && (t.files = null, t.value = "");
            return
        }
    } else if (de(t)) {
        if (t.multiple) {
            if (Array.isArray(r)) {
                t.value = String((n = r[0]) !== null && n !== void 0 ? n : "");
                const s = r.map(o => String(o));
                for (const o of t.options) s.includes(o.value) ? o.selected = !0 : o.selected = !1
            }
        } else {
            t.value = String(r ?? "");
            for (const s of t.options) s.value === String(r) ? s.selected = !0 : s.selected = !1
        }
        return
    }
    t.value = String(r ?? "")
}

function Ge(t, e) {
    for (const n of t.elements) {
        if (tn(n) && ar(n), !et(n) || !n.name) continue;
        const r = Q(n);
        Ri(n, xt(e, r))
    }
}

function lr(t, e) {
    var n = {};
    for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && e.indexOf(r) < 0 && (n[r] = t[r]);
    if (t != null && typeof Object.getOwnPropertySymbols == "function") for (var i = 0, r = Object.getOwnPropertySymbols(t); i < r.length; i++) e.indexOf(r[i]) < 0 && Object.prototype.propertyIsEnumerable.call(t, r[i]) && (n[r[i]] = t[r[i]]);
    return n
}

function Lt(t, e) {
    return Qe(t, n => _(n) ? Lt(n, e) : Array.isArray(n) ? n.length === 0 || n.every(r => typeof r == "string") ? e : n.map(r => {
        const i = Lt(r, e);
        return lr(i, ["key"])
    }) : e)
}

function re(t) {
    return t ? Qe(t, e => _(e) ? re(e) : Array.isArray(e) ? e.length === 0 || e.every(n => typeof n == "string") ? e : e.map(n => {
        if (!_(n)) return n;
        const r = re(n);
        return r.key || (r.key = ur()), r
    }) : e) : {}
}

function ee(t) {
    return t ? Qe(t, e => _(e) ? ee(e) : Array.isArray(e) ? e.length === 0 || e.every(n => typeof n == "string") ? e : e.map(n => {
        if (!_(n)) return n;
        const r = ee(n);
        return lr(r, ["key"])
    }) : e) : {}
}

function dr() {
    class t extends CustomEvent {
        constructor(i) {
            super("feltesuccess", {detail: i})
        }
    }

    class e extends CustomEvent {
        constructor(i) {
            super("felteerror", {detail: i, cancelable: !0})
        }

        setErrors(i) {
            this.preventDefault(), this.errors = i
        }
    }

    class n extends Event {
        constructor() {
            super("feltesubmit", {cancelable: !0})
        }

        handleSubmit(i) {
            this.onSubmit = i
        }

        handleError(i) {
            this.onError = i
        }

        handleSuccess(i) {
            this.onSuccess = i
        }
    }

    return {createErrorEvent: r => new e(r), createSubmitEvent: () => new n, createSuccessEvent: r => new t(r)}
}

function wi(t) {
    if (t) return async function () {
        let n = new FormData(t);
        const r = new URL(t.action),
            i = t.method.toLowerCase() === "get" ? "get" : r.searchParams.get("_method") || t.method;
        let s = t.enctype;
        t.querySelector('input[type="file"]') && (s = "multipart/form-data"), (i === "get" || s === "application/x-www-form-urlencoded") && (n = new URLSearchParams(n));
        let o;
        i === "get" ? (n.forEach((c, d) => {
            r.searchParams.append(d, c)
        }), o = {method: i, headers: {Accept: "application/json"}}) : o = {
            method: i,
            body: n,
            headers: Object.assign(Object.assign({}, s !== "multipart/form-data" && {"Content-Type": s}), {Accept: "application/json"})
        };
        const u = await window.fetch(r.toString(), o);
        if (u.ok) return u;
        throw new bi("An error occurred while submitting the form", u)
    }
}

function je(t, e, n, r) {
    return We(t, e, i => (typeof i < "u" && !Array.isArray(i) || (i || (i = []), typeof r > "u" ? i.push(n) : i.splice(r, 0, n)), i))
}

function Fi(t, e, n, r) {
    return We(t, e, i => (!i || !Array.isArray(i) || ([i[n], i[r]] = [i[r], i[n]]), i))
}

function Ci(t, e, n, r) {
    return We(t, e, i => (!i || !Array.isArray(i) || i.splice(r, 0, i.splice(n, 1)[0]), i))
}

function xn(t) {
    return typeof t == "function"
}

function Bt(t) {
    return (n, r) => {
        if (typeof n == "string") {
            const i = n;
            t(s => {
                const o = xn(r) ? r(xt(s, i)) : r;
                return w(s, i, o)
            })
        } else t(i => xn(n) ? n(i) : n)
    }
}

function Pi({stores: t, config: e, validateErrors: n, validateWarnings: r, _getCurrentExtenders: i}) {
    var s;
    let o, u = re((s = e.initialValues) !== null && s !== void 0 ? s : {});
    const {data: c, touched: d, errors: h, warnings: p, isDirty: b, isSubmitting: D, interacted: A} = t,
        m = Bt(c.update), y = Bt(d.update), v = Bt(h.update), F = Bt(p.update);

    function W(f) {
        m(O => {
            const T = f(O);
            return o && Ge(o, T), T
        })
    }

    const C = (f, O, T) => {
        Bt(W)(f, O), typeof f == "string" && T && y(f, !0)
    };

    function G(f, O, T) {
        const B = _(O) ? Lt(O, !1) : !1, V = _(B) ? dt(B, []) : [];
        O = _(O) ? Object.assign(Object.assign({}, O), {key: ur()}) : O, h.update(H => je(H, f, V, T)), p.update(H => je(H, f, V, T)), d.update(H => je(H, f, B, T)), c.update(H => {
            const ht = je(H, f, O, T);
            return setTimeout(() => o && Ge(o, ht)), ht
        })
    }

    function P(f) {
        h.update(f), p.update(f), d.update(f), c.update(O => {
            const T = f(O);
            return setTimeout(() => o && Ge(o, T)), T
        })
    }

    function ft(f) {
        P(O => Ie(O, f))
    }

    function bt(f, O, T) {
        P(B => Fi(B, f, O, T))
    }

    function St(f, O, T) {
        P(B => Ci(B, f, O, T))
    }

    function Ut(f) {
        const O = xt(u, f), T = _(O) ? Lt(O, !1) : !1, B = _(T) ? dt(T, []) : [];
        c.update(V => {
            const H = w(V, f, O);
            return o && Ge(o, H), H
        }), d.update(V => w(V, f, T)), h.update(V => w(V, f, B)), p.update(V => w(V, f, B))
    }

    const I = Bt(D.update), ut = Bt(b.update), At = Bt(A.update);

    async function wt() {
        const f = Pt(c);
        d.set(Lt(f, !0)), A.set(null);
        const O = await n(f);
        return await r(f), O
    }

    function Ft() {
        C(lt(u)), y(f => dt(f, !1)), A.set(null), b.set(!1)
    }

    function j(f) {
        return async function (T) {
            var B, V, H, ht, Ct, Yt, Jt;
            const {createErrorEvent: Te, createSubmitEvent: _e, createSuccessEvent: Zt} = dr(), _t = _e();
            o == null || o.dispatchEvent(_t);
            const E = (V = (B = _t.onError) !== null && B !== void 0 ? B : f == null ? void 0 : f.onError) !== null && V !== void 0 ? V : e.onError,
                l = (ht = (H = _t.onSuccess) !== null && H !== void 0 ? H : f == null ? void 0 : f.onSuccess) !== null && ht !== void 0 ? ht : e.onSuccess,
                N = (Jt = (Yt = (Ct = _t.onSubmit) !== null && Ct !== void 0 ? Ct : f == null ? void 0 : f.onSubmit) !== null && Yt !== void 0 ? Yt : e.onSubmit) !== null && Jt !== void 0 ? Jt : wi(o);
            if (!N || (T == null || T.preventDefault(), _t.defaultPrevented)) return;
            D.set(!0), A.set(null);
            const S = ee(Pt(c)), at = await n(S, f == null ? void 0 : f.validate),
                Mt = await r(S, f == null ? void 0 : f.warn);
            if (Mt && p.set(or(dt(S, []), Mt)), d.set(Lt(S, !0)), at && (d.set(Lt(at, !0)), Ce(at, J => Array.isArray(J) ? J.length >= 1 : !!J))) {
                await new Promise(J => setTimeout(J)), i().forEach(J => {
                    var yt;
                    return (yt = J.onSubmitError) === null || yt === void 0 ? void 0 : yt.call(J, {data: S, errors: at})
                }), D.set(!1);
                return
            }
            const Ot = {
                event: T,
                setFields: C,
                setData: m,
                setTouched: y,
                setErrors: v,
                setWarnings: F,
                unsetField: ft,
                addField: G,
                resetField: Ut,
                reset: Ft,
                setInitialValues: Tt.setInitialValues,
                moveField: St,
                swapFields: bt,
                form: o,
                controls: o && Array.from(o.elements).filter(et),
                config: Object.assign(Object.assign({}, e), f)
            };
            try {
                const Y = await N(S, Ot);
                o == null || o.dispatchEvent(Zt(Object.assign({response: Y}, Ot))), await (l == null ? void 0 : l(Y, Ot))
            } catch (Y) {
                const J = Te(Object.assign({error: Y}, Ot));
                if (o == null || o.dispatchEvent(J), !E && !J.defaultPrevented) throw Y;
                if (!E && !J.errors) return;
                const yt = J.errors || await (E == null ? void 0 : E(Y, Ot));
                yt && (d.set(Lt(yt, !0)), h.set(yt), await new Promise(It => setTimeout(It)), i().forEach(It => {
                    var Gt;
                    return (Gt = It.onSubmitError) === null || Gt === void 0 ? void 0 : Gt.call(It, {
                        data: S,
                        errors: Pt(h)
                    })
                }))
            } finally {
                D.set(!1)
            }
        }
    }

    const Tt = {
        setData: m,
        setFields: C,
        setTouched: y,
        setErrors: v,
        setWarnings: F,
        setIsSubmitting: I,
        setIsDirty: ut,
        setInteracted: At,
        validate: wt,
        reset: Ft,
        unsetField: ft,
        resetField: Ut,
        addField: G,
        swapFields: bt,
        moveField: St,
        createSubmitHandler: j,
        handleSubmit: j(),
        setInitialValues: f => {
            u = re(f)
        }
    };
    return {
        public: Tt, private: {
            _setFormNode(f) {
                o = f
            }, _getInitialValues: () => u
        }
    }
}

function Li({
                helpers: t,
                stores: e,
                config: n,
                extender: r,
                createSubmitHandler: i,
                handleSubmit: s,
                _setFormNode: o,
                _getInitialValues: u,
                _setCurrentExtenders: c,
                _getCurrentExtenders: d
            }) {
    const {setFields: h, setTouched: p, reset: b, setInitialValues: D} = t, {
        addValidator: A,
        addTransformer: m,
        validate: y
    } = t, {
        data: v,
        errors: F,
        warnings: W,
        touched: C,
        isSubmitting: G,
        isDirty: P,
        interacted: ft,
        isValid: bt,
        isValidating: St
    } = e;

    function Ut(I) {
        I.requestSubmit || (I.requestSubmit = s);

        function ut(E) {
            return function (l) {
                return l({
                    form: I,
                    stage: E,
                    controls: Array.from(I.elements).filter(et),
                    data: v,
                    errors: F,
                    warnings: W,
                    touched: C,
                    isValid: bt,
                    isValidating: St,
                    isSubmitting: G,
                    isDirty: P,
                    interacted: ft,
                    config: n,
                    addValidator: A,
                    addTransformer: m,
                    setFields: h,
                    validate: y,
                    reset: b,
                    createSubmitHandler: i,
                    handleSubmit: s
                })
            }
        }

        c(r.map(ut("MOUNT"))), I.noValidate = !!n.validate;
        const {defaultData: At, defaultTouched: wt} = Ln(I);
        o(I), D(or(lt(At), u())), h(u()), C.set(wt);

        function Ft(E) {
            const l = Q(E),
                N = Array.from(I.querySelectorAll(`[name="${E.name}"]`)).filter(S => et(S) ? l === Q(S) : !1);
            if (N.length !== 0) return N.length === 1 ? v.update(S => w(S, Q(E), E.checked)) : v.update(S => w(S, Q(E), N.filter(le).filter(at => at.checked).map(at => at.value)))
        }

        function j(E) {
            const l = I.querySelectorAll(`[name="${E.name}"]`), N = Array.from(l).find(S => le(S) && S.checked);
            v.update(S => w(S, Q(E), N == null ? void 0 : N.value))
        }

        function Tt(E) {
            var l;
            const N = Array.from((l = E.files) !== null && l !== void 0 ? l : []);
            v.update(S => w(S, Q(E), E.multiple ? N : N[0]))
        }

        function Wt(E) {
            if (!E.multiple) v.update(l => w(l, Q(E), E.value)); else {
                const l = Array.from(E.selectedOptions).map(N => N.value);
                v.update(N => w(N, Q(E), l))
            }
        }

        function f(E) {
            const l = E.target;
            if (!l || !et(l) || de(l) || on(l) || ["checkbox", "radio", "file"].includes(l.type) || !l.name) return;
            P.set(!0);
            const N = cr(l);
            ft.set(l.name), v.update(S => w(S, Q(l), N))
        }

        function O(E) {
            const l = E.target;
            if (!(!l || !et(l) || on(l)) && l.name) if (p(Q(l), !0), ft.set(l.name), (de(l) || ["checkbox", "radio", "file", "hidden"].includes(l.type)) && P.set(!0), l.type === "hidden" && v.update(N => w(N, Q(l), l.value)), de(l)) Wt(l); else if (le(l)) l.type === "checkbox" ? Ft(l) : l.type === "radio" ? j(l) : l.type === "file" && Tt(l); else return
        }

        function T(E) {
            const l = E.target;
            !l || !et(l) || on(l) || l.name && (p(Q(l), !0), ft.set(l.name))
        }

        function B(E) {
            E.preventDefault(), b()
        }

        const V = {childList: !0, subtree: !0};

        function H(E) {
            let l = Pt(v), N = Pt(C), S = Pt(F), at = Pt(W);
            for (const Mt of E.reverse()) {
                if (Mt.hasAttribute("data-felte-keep-on-remove") && Mt.dataset.felteKeepOnRemove !== "false") continue;
                const Ot = /.*(\[[0-9]+\]|\.[0-9]+)\.[^.]+$/;
                let Y = Q(Mt);
                const J = Pt(C);
                if (Ot.test(Y)) {
                    const It = Y.split(".").slice(0, -1).join("."), Gt = xt(J, It);
                    _(Gt) && Object.keys(Gt).length <= 1 && (Y = It)
                }
                l = Ie(l, Y), N = Ie(N, Y), S = Ie(S, Y), at = Ie(at, Y)
            }
            v.set(l), C.set(N), F.set(S), W.set(at)
        }

        const ht = qe(() => {
            d().forEach(N => {
                var S;
                return (S = N.destroy) === null || S === void 0 ? void 0 : S.call(N)
            }), c(r.map(ut("UPDATE")));
            const {defaultData: E, defaultTouched: l} = Ln(I);
            v.update(N => Cn(N, E)), C.update(N => Cn(N, l)), t.setFields(Pt(v))
        }, 0);
        let Ct = [];
        const Yt = qe(() => {
            d().forEach(E => {
                var l;
                return (l = E.destroy) === null || l === void 0 ? void 0 : l.call(E)
            }), c(r.map(ut("UPDATE"))), H(Ct), Ct = []
        }, 0);

        function Jt(E) {
            Array.from(E.addedNodes).some(N => Pn(N) ? et(N) ? !0 : mn(N).length > 0 : !1) && ht()
        }

        function Te(E) {
            for (const l of E.removedNodes) {
                if (!Pn(l)) continue;
                const N = mn(l);
                N.length !== 0 && (Ct.push(...N), Yt())
            }
        }

        function _e(E) {
            for (const l of E) l.type === "childList" && (l.addedNodes.length > 0 && Jt(l), l.removedNodes.length > 0 && Te(l))
        }

        const Zt = new MutationObserver(_e);
        Zt.observe(I, V), I.addEventListener("input", f), I.addEventListener("change", O), I.addEventListener("focusout", T), I.addEventListener("submit", s), I.addEventListener("reset", B);
        const _t = F.subscribe(E => {
            for (const l of I.elements) {
                if (!et(l) || !l.name) continue;
                const N = xt(E, Q(l)), S = Array.isArray(N) ? N.join(`
`) : typeof N == "string" ? N : void 0;
                S !== l.dataset.felteValidationMessage && (S ? (l.dataset.felteValidationMessage = S, l.setAttribute("aria-invalid", "true")) : (delete l.dataset.felteValidationMessage, l.removeAttribute("aria-invalid")))
            }
        });
        return {
            destroy() {
                Zt.disconnect(), I.removeEventListener("input", f), I.removeEventListener("change", O), I.removeEventListener("focusout", T), I.removeEventListener("submit", s), I.removeEventListener("reset", B), _t(), d().forEach(E => {
                    var l;
                    return (l = E.destroy) === null || l === void 0 ? void 0 : l.call(E)
                })
            }
        }
    }

    return {form: Ut}
}

function xi(t) {
    const e = {aborted: !1, priority: t};
    return {
        signal: e, abort() {
            e.aborted = !0
        }
    }
}

function $i(t, e) {
    if (_(t)) return !e || _(e) && Object.keys(e).length === 0 ? dt(t, null) : void 0;
    if (Array.isArray(t)) {
        if (t.some(_)) return;
        const n = Array.isArray(e) ? e : [];
        return t.map((r, i) => {
            const s = n[i];
            return Array.isArray(s) && s.length === 0 ? null : r && s || null
        })
    }
    return Array.isArray(e) && e.length === 0 ? null : Array.isArray(e) ? t ? e : null : t && e ? [e] : null
}

function ki(t, e) {
    if (_(t)) return !e || _(e) && Object.keys(e).length === 0 ? dt(t, null) : void 0;
    if (Array.isArray(t)) {
        if (t.some(_)) return;
        const n = Array.isArray(e) ? e : [];
        return t.map((r, i) => {
            const s = n[i];
            return Array.isArray(s) && s.length === 0 ? null : s || null
        })
    }
    return Array.isArray(e) && e.length === 0 ? null : Array.isArray(e) ? e : e ? [e] : null
}

function Ui([t, e]) {
    return zt(e, t, $i)
}

function Wi([t, e]) {
    return zt(e, t, ki)
}

function Mi(t) {
    return function (n, r, i) {
        const s = Array.isArray(n) ? n : [n], o = new Array(s.length), u = t(i), c = u.set, d = u.subscribe;
        let h;

        function p() {
            h = s.map((D, A) => D.subscribe(m => {
                o[A] = m, c(r(o))
            }))
        }

        function b() {
            h == null || h.forEach(D => D())
        }

        return u.subscribe = function (A) {
            const m = d(A);
            return () => {
                m()
            }
        }, [u, p, b]
    }
}

function Gi(t, e) {
    var n, r, i, s, o, u, c, d, h;
    const p = Mi(t), b = e.initialValues = e.initialValues ? re(dn(lt(e.initialValues), e.transform)) : {},
        D = Lt(ee(b), !1), A = t(D), m = t(0), [y, v, F] = p([A, m], ([L, R]) => Ce(L, mt => !!mt) && R >= 1, !1);
    delete y.set, delete y.update;

    function W(L) {
        let R;
        return async function (mt, vt, ct, Qt = !1) {
            if (!ct || !mt) return;
            let jt = vt && Object.keys(vt).length > 0 ? vt : dt(mt, []);
            const te = xi(Qt);
            if ((!(R != null && R.signal.priority) || Qt) && (R == null || R.abort(), R = te), R.signal.priority && !Qt) return;
            m.update(Oe => Oe + 1);
            const Fn = Di(mt, ct);
            return Fn.forEach(async Oe => {
                const gi = await Oe;
                te.signal.aborted || (jt = ue([jt, gi]), L.set(jt))
            }), await Promise.all(Fn), R = void 0, m.update(Oe => Oe - 1), jt
        }
    }

    let C = dt(D, []);
    const G = t(b), P = dt(D, []), ft = t(P), bt = t(lt(P)), [St, Ut, I] = p([ft, bt], ue, lt(P)), ut = dt(D, []),
        At = t(ut),
        wt = t(lt(ut)), [Ft, j, Tt] = p([At, wt], ue, lt(ut)), [Wt, f, O] = p([St, A], Ui, lt(P)), [T, B, V] = p([Ft, A], Wi, lt(ut));
    let H = !1;
    const [ht, Ct, Yt] = p(St, ([L]) => {
        var R;
        return H ? !Ce(L, it => Array.isArray(it) ? it.length >= 1 : !!it) : (H = !0, !e.validate && !(!((R = e.debounced) === null || R === void 0) && R.validate))
    }, !e.validate && !(!((n = e.debounced) === null || n === void 0) && n.validate));
    delete ht.set, delete ht.update;
    const Jt = t(!1), Te = t(!1), _e = t(null), Zt = W(ft), _t = W(At), E = W(bt), l = W(wt),
        N = qe(E, (o = (i = (r = e.debounced) === null || r === void 0 ? void 0 : r.validateTimeout) !== null && i !== void 0 ? i : (s = e.debounced) === null || s === void 0 ? void 0 : s.timeout) !== null && o !== void 0 ? o : 300, {
            onInit: () => {
                m.update(L => L + 1)
            }, onEnd: () => {
                m.update(L => L - 1)
            }
        }),
        S = qe(l, (h = (c = (u = e.debounced) === null || u === void 0 ? void 0 : u.warnTimeout) !== null && c !== void 0 ? c : (d = e.debounced) === null || d === void 0 ? void 0 : d.timeout) !== null && h !== void 0 ? h : 300);

    async function at(L, R) {
        var it;
        const mt = ee(L), vt = Zt(mt, C, R ?? e.validate, !0);
        if (R) return vt;
        const ct = E(mt, C, (it = e.debounced) === null || it === void 0 ? void 0 : it.validate, !0);
        return ue(await Promise.all([vt, ct]))
    }

    async function Mt(L, R) {
        var it;
        const mt = ee(L), vt = _t(mt, C, R ?? e.warn, !0);
        if (R) return vt;
        const ct = l(mt, C, (it = e.debounced) === null || it === void 0 ? void 0 : it.warn, !0);
        return ue(await Promise.all([vt, ct]))
    }

    let Ot = P, Y = ut;

    function J() {
        const L = G.subscribe(ct => {
            var Qt, jt;
            const te = ee(ct);
            Zt(te, C, e.validate), _t(te, C, e.warn), N(te, C, (Qt = e.debounced) === null || Qt === void 0 ? void 0 : Qt.validate), S(te, C, (jt = e.debounced) === null || jt === void 0 ? void 0 : jt.warn)
        }), R = A.subscribe(ct => {
            C = dt(ct, [])
        }), it = St.subscribe(ct => {
            Ot = ct
        }), mt = Ft.subscribe(ct => {
            Y = ct
        });
        Ut(), Ct(), j(), f(), B(), v();

        function vt() {
            L(), O(), I(), Tt(), V(), Yt(), F(), R(), it(), mt()
        }

        return vt
    }

    function yt(L) {
        ft.set(L(Ot)), bt.set({})
    }

    function It(L) {
        At.set(L(Y)), wt.set({})
    }

    function Gt(L) {
        yt(() => L)
    }

    function vi(L) {
        It(() => L)
    }

    return Wt.set = Gt, Wt.update = yt, T.set = vi, T.update = It, {
        data: G,
        errors: Wt,
        warnings: T,
        touched: A,
        isValid: ht,
        isSubmitting: Jt,
        isDirty: Te,
        isValidating: y,
        interacted: _e,
        validateErrors: at,
        validateWarnings: Mt,
        cleanup: e.preventStoreStart ? () => {
        } : J(),
        start: J
    }
}

function ji(t, e) {
    var n, r;
    (n = t.extend) !== null && n !== void 0 || (t.extend = []), (r = t.debounced) !== null && r !== void 0 || (t.debounced = {}), t.validate && !Array.isArray(t.validate) && (t.validate = [t.validate]), t.debounced.validate && !Array.isArray(t.debounced.validate) && (t.debounced.validate = [t.debounced.validate]), t.transform && !Array.isArray(t.transform) && (t.transform = [t.transform]), t.warn && !Array.isArray(t.warn) && (t.warn = [t.warn]), t.debounced.warn && !Array.isArray(t.debounced.warn) && (t.debounced.warn = [t.debounced.warn]);

    function i(j, {debounced: Tt, level: Wt} = {debounced: !1, level: "error"}) {
        var f;
        const O = Wt === "error" ? "validate" : "warn";
        (f = t.debounced) !== null && f !== void 0 || (t.debounced = {});
        const T = Tt ? t.debounced : t;
        T[O] ? T[O] = [...T[O], j] : T[O] = [j]
    }

    function s(j) {
        t.transform ? t.transform = [...t.transform, j] : t.transform = [j]
    }

    const o = Array.isArray(t.extend) ? t.extend : [t.extend];
    let u = [];
    const c = () => u, d = j => {
            u = j
        }, {
            isSubmitting: h,
            isValidating: p,
            data: b,
            errors: D,
            warnings: A,
            touched: m,
            isValid: y,
            isDirty: v,
            cleanup: F,
            start: W,
            validateErrors: C,
            validateWarnings: G,
            interacted: P
        } = Gi(e.storeFactory, t), ft = b.update, bt = b.set, St = j => ft(Tt => re(dn(j(Tt), t.transform))),
        Ut = j => bt(re(dn(j, t.transform)));
    b.update = St, b.set = Ut;
    const I = Pi({
        extender: o,
        config: t,
        addValidator: i,
        addTransformer: s,
        validateErrors: C,
        validateWarnings: G,
        _getCurrentExtenders: c,
        stores: {
            data: b,
            errors: D,
            warnings: A,
            touched: m,
            isValid: y,
            isValidating: p,
            isSubmitting: h,
            isDirty: v,
            interacted: P
        }
    }), {createSubmitHandler: ut, handleSubmit: At} = I.public;
    u = o.map(j => j({
        stage: "SETUP",
        errors: D,
        warnings: A,
        touched: m,
        data: b,
        isDirty: v,
        isValid: y,
        isValidating: p,
        isSubmitting: h,
        interacted: P,
        config: t,
        addValidator: i,
        addTransformer: s,
        setFields: I.public.setFields,
        reset: I.public.reset,
        validate: I.public.validate,
        handleSubmit: At,
        createSubmitHandler: ut
    }));
    const wt = Object.assign({
        config: t,
        stores: {
            data: b,
            touched: m,
            errors: D,
            warnings: A,
            isSubmitting: h,
            isValidating: p,
            isValid: y,
            isDirty: v,
            interacted: P
        },
        createSubmitHandler: ut,
        handleSubmit: At,
        helpers: Object.assign(Object.assign({}, I.public), {addTransformer: s, addValidator: i}),
        extender: o,
        _getCurrentExtenders: c,
        _setCurrentExtenders: d
    }, I.private), {form: Ft} = Li(wt);
    return Object.assign({
        data: b,
        errors: D,
        warnings: A,
        touched: m,
        isValid: y,
        isSubmitting: h,
        isValidating: p,
        isDirty: v,
        interacted: P,
        form: Ft,
        cleanup: F,
        startStores: W
    }, I.public)
}

const oe = [], un = () => {
};

function Bi(t, e) {
    return t != t ? e == e : t !== e || t && typeof t == "object" || typeof t == "function"
}

function Ki(t, e = un) {
    let n;
    const r = new Set;

    function i(u) {
        if (Bi(t, u) && (t = u, n)) {
            const c = !oe.length;
            for (const d of r) d[1](), oe.push(d, t);
            if (c) {
                for (let d = 0; d < oe.length; d += 2) oe[d][0](oe[d + 1]);
                oe.length = 0
            }
        }
    }

    function s(u) {
        i(u(t))
    }

    function o(u, c = un) {
        const d = [u, c];
        return r.add(d), r.size === 1 && (n = e(i) || un), u(t), () => {
            r.delete(d), n && r.size === 0 && (n(), n = null)
        }
    }

    return {set: i, update: s, subscribe: o}
}

function Z(t) {
    return function () {
        throw new TypeError(`Can't call "${t}" on HTMLFelteFormElement. The element is not ready yet.`)
    }
}

const qi = ["data", "errors", "touched", "warnings", "isSubmitting", "isDirty", "isValid", "isValidating", "interacted"];

function Hi(t) {
    return t.charAt(0).toUpperCase() + t.slice(1)
}

class $n extends HTMLElement {
    constructor() {
        super(...arguments), this._configuration = {}, this._storeValues = {
            data: void 0,
            errors: void 0,
            touched: void 0,
            warnings: void 0,
            isSubmitting: !1,
            isDirty: !1,
            isValid: void 0,
            isValidating: !1,
            interacted: null
        }, this.setData = Z("setData"), this.setFields = Z("setFields"), this.setInitialValues = Z("setInitialValues"), this.addField = Z("addField"), this.unsetField = Z("unsetField"), this.swapFields = Z("swapFields"), this.moveField = Z("moveField"), this.resetField = Z("resetField"), this.reset = Z("reset"), this.submit = Z("submit"), this.createSubmitHandler = Z("createSubmitHandler"), this.setErrors = Z("setErrors"), this.setTouched = Z("setTouched"), this.setWarnings = Z("setWarnings"), this.setIsSubmitting = Z("setIsSubmitting"), this.setIsDirty = Z("setIsDirty"), this.setInteracted = Z("setInteracted"), this._ready = !1, this.validate = Z("validate"), this._formElement = null, this._updateForm = () => {
            var e;
            const n = this.querySelector("form");
            !n || n === this._formElement || (this.dispatchEvent(new Event("felteconnect", {
                bubbles: !0,
                composed: !0
            })), this._formElement = n, (e = this._destroy) === null || e === void 0 || e.call(this), this._destroy = void 0, this._createForm())
        }
    }

    set configuration(e) {
        this._configuration = e, this._destroy && (this._destroy(), this._destroy = void 0, this._ready = !1, this._createForm())
    }

    get configuration() {
        return this._configuration
    }

    get data() {
        return this._storeValues.data
    }

    get errors() {
        return this._storeValues.errors
    }

    get touched() {
        return this._storeValues.touched
    }

    get warnings() {
        return this._storeValues.warnings
    }

    get isSubmitting() {
        return this._storeValues.isSubmitting
    }

    get isDirty() {
        return this._storeValues.isDirty
    }

    get isValid() {
        return this._storeValues.isValid
    }

    get isValidating() {
        return this._storeValues.isValidating
    }

    get interacted() {
        return this._storeValues.interacted
    }

    get ready() {
        return this._ready
    }

    _createForm() {
        var e;
        const n = this._formElement;
        if (!n) return;
        const r = this.configuration;
        this.elements = n.elements;
        const {form: i, cleanup: s, ...o} = ji(r, {storeFactory: Ki});
        this.setData = o.setData, this.setFields = o.setFields, this.setErrors = o.setErrors, this.setTouched = o.setTouched, this.setWarnings = o.setWarnings, this.setIsSubmitting = o.setIsSubmitting, this.setIsDirty = o.setIsDirty, this.setInteracted = o.setInteracted, this.setInitialValues = o.setInitialValues, this.validate = o.validate, this.addField = o.addField, this.unsetField = o.unsetField, this.swapFields = o.swapFields, this.moveField = o.moveField, this.resetField = o.resetField, this.reset = o.reset, this.submit = o.handleSubmit, this.createSubmitHandler = o.createSubmitHandler;
        const u = qi.map(m => o[m].subscribe(y => {
            if (fn(y, this._storeValues[m])) return;
            this._storeValues[m] = y;
            const v = this[`on${Hi(m)}Change`];
            typeof v == "function" && v(y), this.dispatchEvent(new Event(`${m.toLowerCase()}change`))
        })), {destroy: c} = i(n), {createSubmitEvent: d, createErrorEvent: h, createSuccessEvent: p} = dr(), b = m => {
            const y = m, v = d();
            this.dispatchEvent(v), v.defaultPrevented && y.preventDefault(), y.onSubmit = v.onSubmit, y.onSuccess = v.onSuccess, y.onError = v.onError
        }, D = m => {
            const v = p(m.detail);
            this.dispatchEvent(v)
        }, A = m => {
            const y = m, v = h(y.detail);
            this.dispatchEvent(v), y.errors = v.errors, v.defaultPrevented && y.preventDefault()
        };
        n.addEventListener("feltesubmit", b), n.addEventListener("feltesuccess", D), n.addEventListener("felteerror", A), this._destroy = () => {
            c(), s(), n.removeEventListener("feltesubmit", b), n.removeEventListener("feltesuccess", D), n.removeEventListener("felteerror", A), u.forEach(m => m())
        }, this._ready = !0, (e = this.onFelteReady) === null || e === void 0 || e.call(this), this.dispatchEvent(new Event("felteready", {
            bubbles: !0,
            composed: !0
        }))
    }

    connectedCallback() {
        setTimeout(() => {
            this._updateForm(), this._observer = new MutationObserver(this._updateForm), this._observer.observe(this, {childList: !0})
        })
    }

    disconnectedCallback() {
        var e, n;
        (e = this._destroy) === null || e === void 0 || e.call(this), (n = this._observer) === null || n === void 0 || n.disconnect()
    }

    static get observedAttributes() {
        return ["id"]
    }

    attributeChangedCallback(e, n, r) {
        if (n !== r) switch (e) {
            case"id":
                this.id = r;
                break
        }
    }
}

customElements.get("felte-form") || (customElements.define("felte-form", $n), window.HTMLFelteFormElement = $n);

function fr(t, e) {
    function n(r) {
        const i = r.composedPath()[0];
        i.id === t && (i.configuration = e, document.removeEventListener("felteconnect", n))
    }

    return document.addEventListener("felteconnect", n), new Promise(r => {
        function i(s) {
            const o = s.composedPath()[0];
            o.id === t && (r(o), document.removeEventListener("felteready", i))
        }

        document.addEventListener("felteready", i)
    })
}

function x(t) {
    return (...e) => !t(...e)
}

function Rt(t) {
    const e = String(t), n = Number(t);
    return !!(!isNaN(parseFloat(e)) && !isNaN(Number(t)) && isFinite(n))
}

const Xi = x(Rt);

function Se(t, e) {
    return Rt(t) && Rt(e) && Number(t) === Number(e)
}

const zi = x(Se);

function Pe(t, e) {
    return Se(t.length, e)
}

const Vi = x(Pe);

function me(t, e) {
    return Rt(t) && Rt(e) && Number(t) > Number(e)
}

function mr(t, e) {
    return me(t.length, e)
}

function Er(t = 1) {
    const e = [], n = (i, s) => {
        const o = n.get(i);
        if (o) return o[1];
        const u = s();
        return e.unshift([i.concat(), u]), mr(e, t) && (e.length = t), u
    };
    return n.invalidate = i => {
        const s = r(i);
        s > -1 && e.splice(s, 1)
    }, n.get = i => e[r(i)] || null, n;

    function r(i) {
        return e.findIndex(([s]) => Pe(i, s.length) && i.every((o, u) => o === s[u]))
    }
}

function en(t) {
    return t === null
}

const Yi = x(en);

function nn(t) {
    return t === void 0
}

const Ji = x(nn);

function k(t) {
    return en(t) || nn(t)
}

const rn = x(k);

function hr(t) {
    return [].concat(t)
}

function kn(t) {
    return t.forEach(e => e())
}

function pr(t, e) {
    return Object.prototype.hasOwnProperty.call(t, e)
}

function Ee(t) {
    return typeof t == "function"
}

function He(t) {
    return !!t && Ee(t.then)
}

function U(t, ...e) {
    return Ee(t) ? t(...e) : t
}

var ot = Object.assign;

function An(t, e) {
    var n;
    return (n = U(t)) !== null && n !== void 0 ? n : U(e)
}

function nt(t, e) {
    if (!t) throw e instanceof String ? e.valueOf() : new Error(e && U(e))
}

function rt(t) {
    return String(t) === t
}

function Zi(t, e) {
    return !!t != !!e
}

function De(t) {
    return !!t === t
}

function Tn(t) {
    setTimeout(() => {
        throw new Error(t)
    }, 0)
}

var Qi = Object.freeze({
    __proto__: null, createBus: function () {
        const t = {};
        return {
            emit(n, r) {
                e(n).concat(e("*")).forEach(i => {
                    i(r)
                })
            }, on: (n, r) => (t[n] = e(n).concat(r), {
                off() {
                    t[n] = e(n).filter(i => i !== r)
                }
            })
        };

        function e(n) {
            return t[n] || []
        }
    }
});
const ts = es();

function es(t) {
    return e = 0, () => `${t ? t + "_" : ""}${e++}`;
    var e
}

function ns(t, e) {
    let n = !1, r = null;
    for (let s = 0; s < t.length; s++) if (e(t[s], i, s), n) return r;

    function i(s, o) {
        s && (n = !0, r = o)
    }
}

function yr(t) {
    return typeof t == "object" && !k(t)
}

function Me(t) {
    return !!Array.isArray(t)
}

const rs = x(Me);

function he(t) {
    return !t || (pr(t, "length") ? Pe(t, 0) : !!yr(t) && Pe(Object.keys(t), 0))
}

const vr = x(he);

function pe(t) {
    return me(t, 0)
}

const Un = /{(.*?)}/g;

function ye(t, ...e) {
    const n = e[0];
    if (yr(n)) return t.replace(Un, (i, s) => {
        var o;
        return `${(o = n[s]) !== null && o !== void 0 ? o : i}`
    });
    const r = [...e];
    return t.replace(Un, i => `${he(r) ? i : r.shift()}`)
}

function gr(t) {
    let e = t.initial;
    return {
        getState: function () {
            return e
        }, initial: function () {
            return t.initial
        }, staticTransition: n, transition: function (r, i) {
            return e = n(e, r, i)
        }
    };

    function n(r, i, s) {
        var o, u, c;
        let d = (u = (o = t.states[r]) === null || o === void 0 ? void 0 : o[i]) !== null && u !== void 0 ? u : (c = t.states["*"]) === null || c === void 0 ? void 0 : c[i];
        if (Array.isArray(d)) {
            const [, h] = d;
            if (!h(s)) return r;
            d = d[0]
        }
        return d && d !== r ? d : r
    }
}

var Xe = Object.freeze({
    __proto__: null, createTinyState: function (t) {
        let e;
        return r(), () => [e, n, r];

        function n(i) {
            e = U(i, e)
        }

        function r() {
            n(U(t))
        }
    }
});

function Wn(t) {
    return new String(U(t))
}

function is() {
}

var Re = Object.freeze({
    __proto__: null, all: function (...t) {
        return e => !he(t) && t.every(n => U(n, e))
    }, any: function (...t) {
        return e => !he(t) && t.some(n => U(n, e))
    }
});
const an = Symbol();

function ss(t) {
    let e = an;
    return {
        run: function (i, s) {
            const o = r() ? n() : an;
            e = i;
            const u = s();
            return e = o, u
        }, use: n, useX: function (i) {
            return nt(r(), An(i, "Not inside of a running context.")), e
        }
    };

    function n() {
        return r() ? e : t
    }

    function r() {
        return e !== an
    }
}

function _n(t) {
    const e = ss();
    return {
        bind: function (r, i) {
            return function (...s) {
                return n(r, function () {
                    return i(...s)
                })
            }
        }, run: n, use: e.use, useX: e.useX
    };

    function n(r, i) {
        var s;
        const o = e.use(), u = ot({}, o || {}, (s = U(t, r, o)) !== null && s !== void 0 ? s : r);
        return e.run(Object.freeze(u), i)
    }
}

const En = _n((t, e) => {
    const n = {value: t.value, meta: t.meta || {}};
    return e ? t.set ? ot(n, {
        parent: () => function (r) {
            return {value: r.value, meta: r.meta, parent: r.parent}
        }(e)
    }) : e : ot(n, {parent: os})
});

function os() {
    return null
}

function Nr(t, e) {
    return rt(t) && rt(e) && t.endsWith(e)
}

const us = x(Nr);

function br(t, e) {
    return t === e
}

const as = x(br);

function ze(t, e) {
    return Se(t, e) || me(t, e)
}

function Sr(t, e) {
    return (Me(e) || !(!rt(e) || !rt(t))) && e.indexOf(t) !== -1
}

const cs = x(Sr);

function Le(t, e) {
    return Rt(t) && Rt(e) && Number(t) < Number(e)
}

function Ve(t, e) {
    return Se(t, e) || Le(t, e)
}

function Ar(t, e, n) {
    return ze(t, e) && Ve(t, n)
}

const ls = x(Ar);

function Tr(t) {
    return k(t) || rt(t) && !t.trim()
}

const ds = x(Tr), fs = x(De), ms = t => !!Rt(t) && t % 2 == 0;

function _r(t, e) {
    return t in e
}

const Es = x(_r);

function Or(t) {
    return Number.isNaN(t)
}

const hs = x(Or);

function ps(t) {
    return Le(t, 0)
}

function Ir(t) {
    return typeof t == "number"
}

const ys = x(Ir), vs = t => !!Rt(t) && t % 2 != 0, gs = x(rt);

function Dr(t) {
    return !!t
}

const Ns = x(Dr);

function Rr(t, e) {
    if (k(e)) return !1;
    for (const n in e) if (e[n] === t) return !0;
    return !1
}

const bs = x(Rr);

function Ss(t, e) {
    return ze(t.length, e)
}

function wr(t, e) {
    return e instanceof RegExp ? e.test(t) : !!rt(e) && new RegExp(e).test(t)
}

const As = x(wr);

function Ts(t, e) {
    try {
        return e(t)
    } catch {
        return !1
    }
}

function _s(t, e) {
    return Le(t.length, e)
}

function Os(t, e) {
    return Ve(t.length, e)
}

function Fr(t, e) {
    return rt(t) && rt(e) && t.startsWith(e)
}

const Is = x(Fr), Cr = {
    condition: Ts,
    doesNotEndWith: us,
    doesNotStartWith: Is,
    endsWith: Nr,
    equals: br,
    greaterThan: me,
    greaterThanOrEquals: ze,
    gt: me,
    gte: ze,
    inside: Sr,
    isArray: Me,
    isBetween: Ar,
    isBlank: Tr,
    isBoolean: De,
    isEmpty: he,
    isEven: ms,
    isFalsy: Ns,
    isKeyOf: _r,
    isNaN: Or,
    isNegative: ps,
    isNotArray: rs,
    isNotBetween: ls,
    isNotBlank: ds,
    isNotBoolean: fs,
    isNotEmpty: vr,
    isNotKeyOf: Es,
    isNotNaN: hs,
    isNotNull: Yi,
    isNotNullish: rn,
    isNotNumber: ys,
    isNotNumeric: Xi,
    isNotString: gs,
    isNotUndefined: Ji,
    isNotValueOf: bs,
    isNull: en,
    isNullish: k,
    isNumber: Ir,
    isNumeric: Rt,
    isOdd: vs,
    isPositive: pe,
    isString: rt,
    isTruthy: Dr,
    isUndefined: nn,
    isValueOf: Rr,
    lengthEquals: Pe,
    lengthNotEquals: Vi,
    lessThan: Le,
    lessThanOrEquals: Ve,
    longerThan: mr,
    longerThanOrEquals: Ss,
    lt: Le,
    lte: Ve,
    matches: wr,
    notEquals: as,
    notInside: cs,
    notMatches: As,
    numberEquals: Se,
    numberNotEquals: zi,
    shorterThan: _s,
    shorterThanOrEquals: Os,
    startsWith: Fr
};

function Be(t) {
    return Cr[t]
}

function Ye(t, e) {
    const n = {pass: t};
    return e && (n.message = e), n
}

function Ds(t) {
    return An(t, Ye(!0))
}

function Pr(t, e, n, ...r) {
    return function (i) {
        nt(De(i) || i && De(i.pass), "Incorrect return value for rule: " + JSON.stringify(i))
    }(t), De(t) ? Ye(t) : Ye(t.pass, U(t.message, e, n, ...r))
}

function Rs(t) {
    const e = {
        message: function (i) {
            return n = i, r
        }, pass: !1
    };
    let n;
    const r = new Proxy(e, {
        get: (i, s) => {
            const o = Be(s);
            return o ? function (u, c, d) {
                return function (...h) {
                    const p = En.run({value: t}, () => Pr(c(t, ...h), d, t, ...h));

                    function b() {
                        return k(n) ? k(p.message) ? `enforce/${d} failed with ${JSON.stringify(t)}` : Wn(p.message) : Wn(n)
                    }

                    return nt(p.pass, b()), u.pass = p.pass, u
                }
            }(r, o, s) : e[s]
        }
    });
    return r
}

const X = function () {
    const t = {
        context: () => En.useX(), extend: e => {
            ot(Cr, e)
        }
    };
    return new Proxy(ot(Rs, t), {
        get: (e, n) => n in e ? e[n] : Be(n) ? function (r) {
            const i = [];
            let s;
            return function o(u) {
                return (...c) => {
                    const d = Be(u);
                    i.push(p => Pr(d(p, ...c), u, p, ...c));
                    let h = {
                        run: p => Ds(ns(i, (b, D) => {
                            var A;
                            const m = En.run({value: p}, () => b(p));
                            D(!m.pass, Ye(!!m.pass, (A = U(s, p, m.message)) !== null && A !== void 0 ? A : m.message))
                        })), test: p => h.run(p).pass, message: p => (p && (s = p), h)
                    };
                    return h = new Proxy(h, {get: (p, b) => Be(b) ? o(b) : p[b]}), h
                }
            }(r)
        }(n) : void 0
    })
}(), ae = {ISOLATE_ENTER: "ISOLATE_ENTER", ISOLATE_PENDING: "ISOLATE_PENDING", ISOLATE_DONE: "ISOLATE_DONE"};
var fe;
typeof SuppressedError == "function" && SuppressedError, function (t) {
    t.NO_ACTIVE_ISOLATE = "Not within an active isolate", t.UNABLE_TO_PICK_NEXT_ISOLATE = "Unable to pick next isolate. This is a bug, please report it to the Vest maintainers.", t.ENCOUNTERED_THE_SAME_KEY_TWICE = 'Encountered the same key "{key}" twice. This may lead to inconsistent or overriding of results.', t.INVALID_ISOLATE_CANNOT_PARSE = "Invalid isolate was passed to IsolateSerializer. Cannot proceed."
}(fe || (fe = {}));
let Dt = class Lr {
    static at(e, n) {
        var r, i;
        return k(e) ? null : (i = (r = e.children) === null || r === void 0 ? void 0 : r[n]) !== null && i !== void 0 ? i : null
    }

    static cursor(e) {
        var n, r;
        return k(e) ? 0 : (r = (n = e.children) === null || n === void 0 ? void 0 : n.length) !== null && r !== void 0 ? r : 0
    }

    static canReorder(e) {
        return !k(e) && Lr.allowsReorder(e.parent)
    }

    static allowsReorder(e) {
        return (e == null ? void 0 : e.allowReorder) === !0
    }

    static usesKey(e) {
        return !k(e) && rn(e.key)
    }

    static getChildByKey(e, n) {
        var r, i;
        return k(e) ? null : (i = (r = e.keys) === null || r === void 0 ? void 0 : r[n]) !== null && i !== void 0 ? i : null
    }
};

class gt {
    static setParent(e, n) {
        return e.parent = n, e
    }

    static saveOutput(e, n) {
        return e.output = n, e
    }

    static setKey(e, n) {
        return e.key = n, e
    }

    static addChild(e, n) {
        var r;
        nt(e), e.children = (r = e.children) !== null && r !== void 0 ? r : [], e.children.push(n), gt.setParent(n, e)
    }

    static removeChild(e, n) {
        var r, i;
        e.children = (i = (r = e.children) === null || r === void 0 ? void 0 : r.filter(s => s !== n)) !== null && i !== void 0 ? i : null
    }

    static addChildKey(e, n, r) {
        var i;
        nt(e), e.keys = (i = e.keys) !== null && i !== void 0 ? i : {}, e.keys[n] = r
    }

    static slice(e, n) {
        k(e.children) || (e.children.length = n)
    }

    static setData(e, n) {
        e.data = n
    }

    static abort(e, n) {
        k(e.abortController) || e.abortController.abort(n)
    }
}

const we = _n((t, e) => {
    if (e) return null;
    nt(t.historyRoot);
    const [n] = t.historyRoot(), r = {};
    return ot(r, {historyNode: n, runtimeNode: null, runtimeRoot: null, stateRef: t}), r
}), xr = we.run, $ = {
    Run: xr, addNodeToHistory: Wr, createRef: function (t, e) {
        return Object.freeze({Bus: Qi.createBus(), Reconciler: t, appData: U(e), historyRoot: Xe.createTinyState(null)})
    }, persist: $r, reset: function () {
        const [, , t] = Ke();
        t()
    }, useAvailableRoot: function () {
        const t = Gr();
        if (t) return t;
        const [e] = Ke();
        return e
    }, useCurrentCursor: function () {
        const t = ie();
        return t ? Dt.cursor(t) : 0
    }, useHistoryRoot: Ke, useLoadRootNode: function (t) {
        Mr(t)
    }, useXAppData: function () {
        return Vt().stateRef.appData
    }
};

function $r(t) {
    const e = we.useX();
    return (...n) => {
        var r;
        const i = (r = we.use()) !== null && r !== void 0 ? r : e;
        return we.run(i.stateRef, () => t(...n))
    }
}

function Vt() {
    return we.useX()
}

function Ke() {
    return Vt().stateRef.historyRoot()
}

function kr() {
    return Vt().historyNode
}

function Ur() {
    const t = ie(), e = kr();
    return t ? Dt.at(e, Dt.cursor(t)) : e
}

function Wr(t) {
    const e = ie();
    e ? function (n) {
        const r = ie();
        nt(r, fe.NO_ACTIVE_ISOLATE), gt.addChild(r, n)
    }(t) : Mr(t), gt.setParent(t, e)
}

function Mr(t) {
    const [, e] = Ke();
    e(t)
}

function ie() {
    var t;
    return (t = Vt().runtimeNode) !== null && t !== void 0 ? t : null
}

function Gr() {
    return Vt().runtimeRoot
}

function jr() {
    return Vt().stateRef.Bus
}

function hn(t, e) {
    const n = jr().emit;
    return k(t) || n(t, e), $r(n)
}

var st, qt = Object.freeze({
    __proto__: null, useBus: jr, useEmit: hn, usePrepareEmitter: function (t) {
        const e = hn();
        return n => e(t, n)
    }
});
(function (t) {
    t.Type = "$type", t.Keys = "keys", t.Key = "key", t.Parent = "parent", t.Data = "data", t.AllowReorder = "allowReorder", t.Status = "status", t.AbortController = "abortController", t.Children = "children"
})(st || (st = {}));
st.AbortController, st.Parent, st.Keys;

function Br(t, e) {
    return (t == null ? void 0 : t[st.Type]) === e
}

function pn(t, e) {
    return Br(t, e[st.Type])
}

var Kr = Object.freeze({
    __proto__: null, isIsolateType: Br, isSameIsolateIdentity: function (t, e) {
        return Object.is(t, e) || pn(t, e) && t.key === e.key
    }, isSameIsolateType: pn
});
let yn = class qr {
    static reconcile(e) {
        const n = function (r, i) {
            var s;
            if (k(i)) return function (u) {
                return Dt.usesKey(u) ? qr.handleIsolateNodeWithKey(u) : u
            }(r);
            if (!pn(r, i)) return r;
            const o = Vt().stateRef.Reconciler;
            return (s = o(r, i)) !== null && s !== void 0 ? s : function (u, c) {
                return u
            }(r)
        }(e, Ur());
        return nt(n, fe.UNABLE_TO_PICK_NEXT_ISOLATE), n
    }

    static dropNextNodesOnReorder(e, n, r) {
        const i = e(n, r);
        return i && function () {
            const s = ie(), o = kr();
            !o || !s || gt.slice(o, Dt.cursor(s))
        }(), i
    }

    static handleIsolateNodeWithKey(e) {
        nt(Dt.usesKey(e));
        const n = function (i) {
            if (k(i)) return null;
            const s = Vt().historyNode;
            return Dt.getChildByKey(s, i)
        }(e.key);
        let r = e;
        return k(n) || (r = n), function (i, s) {
            if (!i) return;
            const o = ie();
            nt(o, fe.NO_ACTIVE_ISOLATE), k(Dt.getChildByKey(o, i)) ? gt.addChildKey(o, i, s) : Tn(ye(fe.ENCOUNTERED_THE_SAME_KEY_TWICE, {key: i}))
        }(e.key, e), r
    }
}, Ae = class Hr {
    static create(e, n, r, i) {
        const s = ie(), o = gt.setParent(function (p, b, D = null) {
            const A = b ?? {}, {allowReorder: m, status: y} = A, v = function (F, W) {
                var C = {};
                for (var G in F) Object.prototype.hasOwnProperty.call(F, G) && W.indexOf(G) < 0 && (C[G] = F[G]);
                if (F != null && typeof Object.getOwnPropertySymbols == "function") {
                    var P = 0;
                    for (G = Object.getOwnPropertySymbols(F); P < G.length; P++) W.indexOf(G[P]) < 0 && Object.prototype.propertyIsEnumerable.call(F, G[P]) && (C[G[P]] = F[G[P]])
                }
                return C
            }(A, ["allowReorder", "status"]);
            return Object.assign(Object.assign({
                [st.AllowReorder]: m,
                [st.AbortController]: new AbortController,
                [st.Keys]: null,
                [st.Parent]: null,
                [st.Type]: p,
                [st.Data]: v
            }, y && {[st.Status]: y}), {children: null, key: D, output: null})
        }(e, r, i), s), u = yn.reconcile(o), c = Ur(), d = Object.is(u, o);
        Wr(u);
        const h = d ? function (p, b, D) {
            const A = Gr(), m = hn(),
                y = xr(Object.assign({historyNode: p, runtimeNode: b}, !A && {runtimeRoot: b}), () => {
                    m(ae.ISOLATE_ENTER, b);
                    const v = D(b);
                    return He(v) ? (m(ae.ISOLATE_PENDING, b), v.then(F => {
                        Hr.isIsolate(F) && gt.addChild(b, F), m(ae.ISOLATE_DONE, b)
                    })) : m(ae.ISOLATE_DONE, b), v
                });
            return b.output = y, y
        }(c, o, n) : u.output;
        return gt.saveOutput(u, h), u
    }

    static isIsolate(e) {
        return rn(e) && e[st.Type]
    }
};

function ce(t, e, n) {
    if (k(t.children)) return;
    let r = !1;
    for (const s of t.children) {
        if (r || ((k(n) || U(n, s)) && e(s, i), r)) return;
        ce(s, (o, u) => {
            e(o, () => {
                u(), i()
            })
        }, n)
    }

    function i() {
        r = !0
    }
}

function Mn(t, e, n) {
    let r = !1;
    return ce(t, (i, s) => {
        e(i) && (s(), r = !0)
    }, n), r
}

function Gn(t, e) {
    let n = t;
    do {
        if (e(n)) return n;
        n = n.parent
    } while (n);
    return null
}

var Ht = Object.freeze({
    __proto__: null, closest: Gn, closestExists: function (t, e) {
        return !!Gn(t, e)
    }, every: function (t, e, n) {
        let r = !0;
        return ce(t, (i, s) => {
            e(i) || (s(), r = !1)
        }, n), r
    }, find: function (t, e, n) {
        let r = null;
        return ce(t, (i, s) => {
            e(i) && (s(), r = i)
        }, n), r
    }, findClosest: function (t, e) {
        var n, r;
        let i = null, s = t;
        for (; s && (i = (r = (n = s.children) === null || n === void 0 ? void 0 : n.find(e)) !== null && r !== void 0 ? r : null, !i);) s = s.parent;
        return i
    }, has: function (t, e) {
        return Mn(t, () => !0, e)
    }, pluck: function (t, e, n) {
        ce(t, r => {
            e(r) && r.parent && gt.removeChild(r.parent, r)
        }, n)
    }, some: Mn, walk: ce
});
const Xr = "Focused", ws = "Group", Fs = "OmitWhen", Cs = "SkipWhen", Ps = "Suite", zr = "Test";

class $t {
    static setOptionalField(e, n, r) {
        const i = e.data.optional, s = i[n];
        ot(i, {[n]: ot({}, s, r(s))})
    }

    static getOptionalField(e, n) {
        var r;
        return (r = $t.getOptionalFields(e)[n]) !== null && r !== void 0 ? r : {}
    }

    static getOptionalFields(e) {
        var n, r;
        return (r = (n = e.data) === null || n === void 0 ? void 0 : n.optional) !== null && r !== void 0 ? r : {}
    }
}

var xe, $e;
(function (t) {
    t[t.CUSTOM_LOGIC = 0] = "CUSTOM_LOGIC", t[t.AUTO = 1] = "AUTO"
})(xe || (xe = {})), function (t) {
    t.EAGER = "EAGER", t.ALL = "ALL", t.ONE = "ONE"
}($e || ($e = {}));
const pt = _n((t, e) => e ? null : ot({
    inclusion: {},
    mode: Xe.createTinyState($e.EAGER),
    suiteParams: [],
    testMemoCache: xs
}, t));

function vn() {
    return pt.useX().inclusion
}

function Ls() {
    return pt.useX().mode()
}

const xs = Er(10);

function $s(t) {
    var e;
    const n = $.useAvailableRoot(), r = pt.useX().suiteParams,
        i = (e = r == null ? void 0 : r[0]) !== null && e !== void 0 ? e : {};
    if (Me(t) || rt(t)) hr(t).forEach(s => {
        $t.setOptionalField(n, s, () => ({
            type: xe.AUTO,
            applied: !!pr(i, s) && X.isBlank().test(i == null ? void 0 : i[s]),
            rule: null
        }))
    }); else for (const s in t) {
        const o = t[s];
        $t.setOptionalField(n, s, () => ({type: xe.CUSTOM_LOGIC, rule: o, applied: X.isBlank().test(o) || o === !0}))
    }
}

function ke(t) {
    var e, n;
    if (!t) return !1;
    const r = $.useAvailableRoot();
    return (n = (e = $t.getOptionalField(r, t)) === null || e === void 0 ? void 0 : e.applied) !== null && n !== void 0 && n
}

var q;
(function (t) {
    t.TEST_RUN_STARTED = "test_run_started", t.TEST_COMPLETED = "test_completed", t.ALL_RUNNING_TESTS_FINISHED = "all_running_tests_finished", t.REMOVE_FIELD = "remove_field", t.RESET_FIELD = "reset_field", t.RESET_SUITE = "reset_suite", t.SUITE_RUN_STARTED = "suite_run_started", t.SUITE_CALLBACK_RUN_FINISHED = "SUITE_CALLBACK_RUN_FINISHED", t.DONE_TEST_OMISSION_PASS = "DONE_TEST_OMISSION_PASS"
})(q || (q = {}));
const ks = Er();

function ve() {
    return $.useXAppData()
}

function On() {
    return ve().doneCallbacks()
}

function In() {
    return ve().fieldCallbacks()
}

function Dn() {
    return ve().suiteId
}

function Vr() {
    ve().suiteResultCache.invalidate([Dn()])
}

function jn() {
    const [, , t] = On(), [, , e] = In();
    t(), e()
}

function Us(t) {
    $.useLoadRootNode(t), Vr()
}

const ge = "PENDING", gn = "INITIAL", Et = {[ge]: ge, [gn]: gn, DONE: "DONE"};

function Bn(t, e) {
    return Yr.staticTransition(t ?? Et.INITIAL, e)
}

const Yr = gr({
    initial: Et.INITIAL,
    states: {
        [Et.DONE]: {},
        [Et.INITIAL]: {[Et.PENDING]: Et.PENDING, [Et.DONE]: Et.DONE},
        [Et.PENDING]: {[Et.DONE]: Et.DONE}
    }
});

class ne {
    static getStatus(e) {
        var n;
        return (n = e.status) !== null && n !== void 0 ? n : gn
    }

    static setStatus(e, n, r) {
        e.status = this.stateMachine.staticTransition(ne.getStatus(e), n, r)
    }

    static statusEquals(e, n) {
        return ne.getStatus(e) === n
    }

    static setPending(e) {
        this.setStatus(e, ge)
    }

    static isPending(e) {
        return ne.statusEquals(e, ge)
    }
}

var Nt;
ne.stateMachine = Yr, function (t) {
    t.HOOK_CALLED_OUTSIDE = "hook called outside of a running suite.", t.EXPECTED_VEST_TEST = "Expected value to be an instance of IsolateTest", t.FIELD_NAME_REQUIRED = "Field name must be passed", t.SUITE_MUST_BE_INITIALIZED_WITH_FUNCTION = "Suite must be initialized with a function", t.PROMISIFY_REQUIRE_FUNCTION = "Vest.Promisify must be called with a function", t.PARSER_EXPECT_RESULT_OBJECT = "Vest parser: expected argument at position 0 to be Vest's result object.", t.WARN_MUST_BE_CALLED_FROM_TEST = "Warn must be called from within the body of a test function", t.EACH_CALLBACK_MUST_BE_A_FUNCTION = "Each must be called with a function", t.INVALID_PARAM_PASSED_TO_FUNCTION = 'Incompatible params passed to {fn_name} function. "{param}" must be of type {expected}', t.TESTS_CALLED_IN_DIFFERENT_ORDER = `Vest Critical Error: Tests called in different order than previous run.
    expected: {fieldName}
    received: {prevName}
    This can happen on one of two reasons:
    1. You're using if/else statements to conditionally select tests. Instead, use "skipWhen".
    2. You are iterating over a list of tests, and their order changed. Use "each" and a custom key prop so that Vest retains their state.`, t.UNEXPECTED_TEST_REGISTRATION_ERROR = `Unexpected error encountered during test registration.
      Please report this issue to Vest's Github repository.
      Test Object: {testObject}.
      Error: {error}.`, t.UNEXPECTED_TEST_RUN_ERROR = `Unexpected error encountered during test run. Please report this issue to Vest's Github repository.
      Test Object: {testObject}.`, t.INCLUDE_SELF = "Trying to call include.when on the same field."
}(Nt || (Nt = {}));
const g = {
    [ge]: ge,
    CANCELED: "CANCELED",
    FAILED: "FAILED",
    OMITTED: "OMITTED",
    PASSING: "PASSING",
    SKIPPED: "SKIPPED",
    UNTESTED: "UNTESTED",
    WARNING: "WARNING"
}, Jr = "RESET", Zr = gr({
    initial: g.UNTESTED,
    states: {
        "*": {[g.OMITTED]: g.OMITTED, [Jr]: g.UNTESTED},
        [g.UNTESTED]: {
            [g.CANCELED]: g.CANCELED,
            [g.FAILED]: g.FAILED,
            [g.PASSING]: g.PASSING,
            [g.PENDING]: g.PENDING,
            [g.SKIPPED]: g.SKIPPED,
            [g.WARNING]: g.WARNING
        },
        [g.PENDING]: {
            [g.CANCELED]: g.CANCELED,
            [g.FAILED]: g.FAILED,
            [g.PASSING]: g.PASSING,
            [g.SKIPPED]: [g.SKIPPED, t => t === !0],
            [g.WARNING]: g.WARNING
        },
        [g.SKIPPED]: {},
        [g.FAILED]: {},
        [g.WARNING]: {},
        [g.PASSING]: {},
        [g.CANCELED]: {},
        [g.OMITTED]: {}
    }
});
var z, Xt, Ue;

function Qr(t) {
    return t === z.ERRORS ? Xt.ERROR_COUNT : Xt.WARN_COUNT
}

(function (t) {
    t.WARNINGS = "warnings", t.ERRORS = "errors"
})(z || (z = {})), function (t) {
    t.ERROR_COUNT = "errorCount", t.WARN_COUNT = "warnCount"
}(Xt || (Xt = {})), function (t) {
    t.Error = "error", t.Warning = "warning"
}(Ue || (Ue = {}));

class a extends ne {
    static getData(e) {
        return nt(e.data), e.data
    }

    static is(e) {
        return Kr.isIsolateType(e, zr)
    }

    static isX(e) {
        nt(a.is(e), Nt.EXPECTED_VEST_TEST)
    }

    static cast(e) {
        return a.isX(e), e
    }

    static warns(e) {
        return a.getData(e).severity === Ue.Warning
    }

    static isOmitted(e) {
        return a.statusEquals(e, g.OMITTED)
    }

    static isUntested(e) {
        return a.statusEquals(e, g.UNTESTED)
    }

    static isFailing(e) {
        return a.statusEquals(e, g.FAILED)
    }

    static isCanceled(e) {
        return a.statusEquals(e, g.CANCELED)
    }

    static isSkipped(e) {
        return a.statusEquals(e, g.SKIPPED)
    }

    static isPassing(e) {
        return a.statusEquals(e, g.PASSING)
    }

    static isWarning(e) {
        return a.statusEquals(e, g.WARNING)
    }

    static hasFailures(e) {
        return a.isFailing(e) || a.isWarning(e)
    }

    static isNonActionable(e) {
        return a.isSkipped(e) || a.isOmitted(e) || a.isCanceled(e)
    }

    static isTested(e) {
        return a.hasFailures(e) || a.isPassing(e)
    }

    static awaitsResolution(e) {
        return a.isSkipped(e) || a.isUntested(e) || a.isPending(e)
    }

    static isAsyncTest(e) {
        return He(a.getData(e).asyncTest)
    }

    static fail(e) {
        a.setStatus(e, a.warns(e) ? g.WARNING : g.FAILED)
    }

    static pass(e) {
        a.setStatus(e, g.PASSING)
    }

    static warn(e) {
        a.setData(e, n => Object.assign(Object.assign({}, n), {severity: Ue.Warning}))
    }

    static setData(e, n) {
        e.data = U(n, a.getData(e))
    }

    static skip(e, n) {
        a.setStatus(e, g.SKIPPED, n)
    }

    static cancel(e) {
        a.setStatus(e, g.CANCELED), gt.abort(e, g.CANCELED)
    }

    static omit(e) {
        a.setStatus(e, g.OMITTED)
    }

    static reset(e) {
        a.setStatus(e, Jr)
    }
}

function sn(t, e) {
    return !!e && !Ne(t, e)
}

function Ne(t, e) {
    return !(!e || t.fieldName !== e)
}

a.stateMachine = Zr;

class kt {
    static hasPending(e) {
        const n = kt.defaultRoot();
        return !!n && Ht.some(n, Re.all(ne.isPending, e == null || e))
    }

    static hasRemainingWithTestNameMatching(e) {
        return kt.hasPending(Re.any(k(e), Re.all(a.is, n => function (r, i) {
            return !i || Ne(r, i)
        }(a.getData(n), e))))
    }
}

kt.defaultRoot = $.useAvailableRoot;

class M {
    static hasNoTests(e = M.defaultRoot()) {
        return !e || !Ht.has(e, a.is)
    }

    static someTests(e, n = M.defaultRoot()) {
        return !!n && Ht.some(n, r => (a.isX(r), e(r)), a.is)
    }

    static everyTest(e, n = M.defaultRoot()) {
        return !!n && Ht.every(n, r => (a.isX(r), e(r)), a.is)
    }

    static walkTests(e, n = M.defaultRoot()) {
        n && Ht.walk(n, (r, i) => {
            e(a.cast(r), i)
        }, a.is)
    }

    static pluckTests(e, n = M.defaultRoot()) {
        n && Ht.pluck(n, r => (a.isX(r), e(r)), a.is)
    }

    static resetField(e) {
        M.walkTests(n => {
            Ne(a.getData(n), e) && a.reset(n)
        }, M.defaultRoot())
    }

    static removeTestByFieldName(e, n = M.defaultRoot()) {
        M.pluckTests(r => Ne(a.getData(r), e), n)
    }
}

function Kn() {
    const t = $.useAvailableRoot(), e = $t.getOptionalFields(t);
    if (he(e)) return;
    const n = new Set;

    function r(i) {
        const {fieldName: s} = a.getData(i);
        n.has(s) && (a.omit(i), $t.setOptionalField(t, s, o => Object.assign(Object.assign({}, o), {applied: !0})))
    }

    M.walkTests(i => {
        if (a.isPending(i)) return;
        const {fieldName: s} = a.getData(i);
        n.has(s) ? r(i) : function (o) {
            const {fieldName: u} = a.getData(o), c = $t.getOptionalField(t, u);
            U(c.rule) === !0 && n.add(u), r(o)
        }(i)
    }), qt.useEmit(q.DONE_TEST_OMISSION_PASS)
}

function Ws() {
    const t = qt.useBus();
    return e(q.TEST_COMPLETED, n => {
        if (a.isCanceled(n)) return;
        const {fieldName: r} = a.getData(n);
        (function (i) {
            const [s] = In();
            i && !kt.hasRemainingWithTestNameMatching(i) && Me(s[i]) && kn(s[i])
        })(r)
    }), e(q.TEST_RUN_STARTED, () => {
    }), e(ae.ISOLATE_PENDING, n => {
        a.is(n) && a.setPending(n), function (r) {
            r.status = Bn(r.status, Et.PENDING)
        }(n)
    }), e(ae.ISOLATE_DONE, n => {
        a.is(n) && t.emit(q.TEST_COMPLETED, n), function (r) {
            r.status = Bn(r.status, Et.DONE)
        }(n), kt.hasPending() || t.emit(q.ALL_RUNNING_TESTS_FINISHED)
    }), e(q.DONE_TEST_OMISSION_PASS, () => {
    }), e(q.ALL_RUNNING_TESTS_FINISHED, () => {
        M.someTests(a.isAsyncTest) && Kn(), function () {
            const [n] = On();
            kn(n)
        }()
    }), e(q.RESET_FIELD, n => {
        M.resetField(n)
    }), e(q.SUITE_RUN_STARTED, () => {
        jn()
    }), e(q.SUITE_CALLBACK_RUN_FINISHED, () => {
        Kn()
    }), e(q.REMOVE_FIELD, n => {
        M.removeTestByFieldName(n)
    }), e(q.RESET_SUITE, () => {
        jn(), $.reset()
    }), {
        subscribe: function (n) {
            return t.on("*", () => {
                n()
            }).off
        }
    };

    function e(n, r) {
        t.on(n, (...i) => {
            Vr(), r(...i)
        })
    }
}

M.defaultRoot = $.useAvailableRoot;

function ti(t, e) {
    const {groupName: n} = a.getData(t), {groupName: r, fieldName: i} = a.getData(e);
    return Ne(a.getData(t), i) && n === r && t.key === e.key
}

const cn = x(function (t, e) {
    return a.getData(t).groupName === e
});

function Nn(t) {
    return function (e, n) {
        return M.someTests(r => ei(r, e, n))
    }(z.ERRORS, t)
}

function ei(t, e, n) {
    return !!a.hasFailures(t) && !sn(a.getData(t), n) && !function (r, i) {
        return Zi(r === z.WARNINGS, a.warns(i))
    }(e, t)
}

function qn(t) {
    const [e] = Ls();
    return e === t
}

function Ms(t) {
    return qn($e.ONE) ? Nn() : !!qn($e.EAGER) && Nn(t.fieldName)
}

function ni(t, e, n) {
    return n ? function (r, i, s) {
        var o;
        return ((o = r == null ? void 0 : r[s]) === null || o === void 0 ? void 0 : o[i]) || []
    }(t, e, n) : function (r, i) {
        const s = {}, o = Qr(i);
        for (const u in r) pe(r[u][o]) && (s[u] = r[u][i] || []);
        return s
    }(t, e)
}

function Gs(t) {
    return {
        getError: function (n) {
            return Jn(z.ERRORS, t, n)
        }, getErrors: function (n) {
            return Hn(t, z.ERRORS, n)
        }, getErrorsByGroup: function (n, r) {
            return Xn(t, z.ERRORS, n, r)
        }, getWarning: function (n) {
            return Jn(z.WARNINGS, t, n)
        }, getWarnings: function (n) {
            return Hn(t, z.WARNINGS, n)
        }, getWarningsByGroup: function (n, r) {
            return Xn(t, z.WARNINGS, n, r)
        }, hasErrors: function (n) {
            return Yn(t, Xt.ERROR_COUNT, n)
        }, hasErrorsByGroup: function (n, r) {
            return Vn(t, Xt.ERROR_COUNT, n, r)
        }, hasWarnings: function (n) {
            return Yn(t, Xt.WARN_COUNT, n)
        }, hasWarningsByGroup: function (n, r) {
            return Vn(t, Xt.WARN_COUNT, n, r)
        }, isPending: function (n) {
            var r;
            return me(n ? (r = t.tests[n]) === null || r === void 0 ? void 0 : r.pendingCount : t.pendingCount, 0)
        }, isTested: function (n) {
            var r;
            return pe((r = t.tests[n]) === null || r === void 0 ? void 0 : r.testCount)
        }, isValid: function (n) {
            var r;
            return n ? !!(!((r = t.tests[n]) === null || r === void 0) && r.valid) : t.valid
        }, isValidByGroup: function (n, r) {
            const i = t.groups[n];
            if (!i) return !1;
            if (r) return zn(i, r);
            for (const s in i) if (!zn(i, s)) return !1;
            return !0
        }
    }
}

function Hn(t, e, n) {
    return ni(t.tests, e, n)
}

function Xn(t, e, n, r) {
    return ni(t.groups[n], e, r)
}

function zn(t, e) {
    var n;
    return !!(!((n = t[e]) === null || n === void 0) && n.valid)
}

function Vn(t, e, n, r) {
    var i, s;
    const o = t.groups[n];
    if (!o) return !1;
    if (r) return pe((i = o[r]) === null || i === void 0 ? void 0 : i[e]);
    for (const u in o) if (pe((s = o[u]) === null || s === void 0 ? void 0 : s[e])) return !0;
    return !1
}

function Yn(t, e, n) {
    var r;
    const i = n ? (r = t.tests[n]) === null || r === void 0 ? void 0 : r[e] : t[e] || 0;
    return pe(i)
}

function Jn(t, e, n) {
    var r;
    const i = e[t];
    return n ? (r = i.find(s => Ne(s, n))) === null || r === void 0 ? void 0 : r.message : i[0]
}

var ri, ii, be;

class si {
    constructor() {
        this.errorCount = 0, this.warnCount = 0, this.testCount = 0, this.pendingCount = 0
    }
}

class js extends si {
    constructor() {
        super(...arguments), this[ri] = [], this[ii] = [], this.groups = {}, this.tests = {}, this.valid = !1
    }
}

ri = z.ERRORS, ii = z.WARNINGS;

class Rn {
    constructor(e, n, r) {
        this.fieldName = e, this.message = n, this.groupName = r
    }

    static fromTestObject(e) {
        const {fieldName: n, message: r, groupName: i} = a.getData(e);
        return new Rn(n, r, i)
    }
}

function Zn(t) {
    return !!ke(t) || !M.hasNoTests() && !Nn(t) && !function (e) {
        return kt.hasPending(Re.all(a.is, n => !sn(a.getData(n), e), () => !ke(e)))
    }(t) && function (e) {
        return M.everyTest(n => oi(n, e))
    }(t)
}

function Bs(t, e) {
    return !!ke(e) || !function (n, r, i) {
        return M.someTests(s => !cn(s, r) && ei(s, n, i))
    }(z.ERRORS, t, e) && !function (n, r) {
        return kt.hasPending(Re.all(a.is, i => !cn(i, n), i => !sn(a.getData(i), r), () => !ke(r)))
    }(t, e) && function (n, r) {
        return M.everyTest(i => !!cn(i, n) || oi(i, r))
    }(t, e)
}

function oi(t, e) {
    return !!sn(a.getData(t), e) || a.isOmitted(t) || a.isTested(t) || function (n) {
        const r = $.useAvailableRoot(), {fieldName: i} = a.getData(n);
        return $t.getOptionalField(r, i).type === xe.AUTO && a.awaitsResolution(n)
    }(t)
}

function Ks() {
    const t = new js;
    return M.walkTests(e => {
        t.tests = function (n, r) {
            const i = a.getData(r).fieldName, s = Object.assign({}, n);
            return s[i] = tr(s[i], r), s[i].valid = s[i].valid !== !1 && Zn(i), s
        }(t.tests, e), t.groups = function (n, r) {
            const {groupName: i, fieldName: s} = a.getData(r);
            if (!i) return n;
            const o = Object.assign({}, n);
            return o[i] = o[i] || {}, o[i][s] = tr(o[i][s], r), o[i][s].valid = o[i][s].valid !== !1 && Bs(i, s), o
        }(t.groups, e), t.errors = Qn(z.ERRORS, t.errors, e), t.warnings = Qn(z.WARNINGS, t.warnings, e)
    }), t.valid = Zn(), function (e) {
        for (const n in e.tests) e.errorCount += e.tests[n].errorCount, e.warnCount += e.tests[n].warnCount, e.testCount += e.tests[n].testCount, e.pendingCount += e.tests[n].pendingCount;
        return e
    }(t)
}

function Qn(t, e, n) {
    return a.isOmitted(n) ? e : (t === z.WARNINGS ? a.isWarning(n) : a.isFailing(n)) ? e.concat(Rn.fromTestObject(n)) : e
}

function tr(t, e) {
    const {message: n} = a.getData(e), r = An(t ? Object.assign({}, t) : null, qs);
    return a.isNonActionable(e) || (a.isPending(e) && r.pendingCount++, a.isFailing(e) ? i(z.ERRORS) : a.isWarning(e) && i(z.WARNINGS), r.testCount++), r;

    function i(s) {
        const o = Qr(s);
        r[o]++, n && (r[s] = (r[s] || []).concat(n))
    }
}

function qs() {
    return ot(new si, {errors: [], valid: !0, warnings: []})
}

function se() {
    return t = () => {
        const e = Ks(), n = ve().suiteName;
        return Object.freeze(ot(e, Gs(e), {suiteName: n}))
    }, (0, ve().suiteResultCache)([Dn()], t);
    var t
}

function Hs(t, e) {
    Ae.create(Fs, () => {
        pt.run({omitted: ui() || U(t, U(se))}, e)
    })
}

function ui() {
    return function () {
        var t;
        return (t = pt.useX().omitted) !== null && t !== void 0 && t
    }()
}

function Xs(t, e) {
    Ae.create(Cs, () => {
        pt.run({skipped: wn() || U(t, U(se))}, e)
    })
}

function wn() {
    return function () {
        var t;
        return (t = pt.useX().skipped) !== null && t !== void 0 && t
    }()
}

function ai(t, e) {
    return Ae.create(Xr, is, {focusMode: t, match: hr(e).filter(rt), matchAll: e === !0})
}

(function (t) {
    t[t.ONLY = 0] = "ONLY", t[t.SKIP = 1] = "SKIP"
})(be || (be = {}));

class Fe {
    static isSkipFocused(e, n) {
        return (e == null ? void 0 : e.data.focusMode) === be.SKIP && (er(e, n) || e.data.matchAll === !0)
    }

    static isOnlyFocused(e, n) {
        return (e == null ? void 0 : e.data.focusMode) === be.ONLY && er(e, n)
    }

    static isIsolateFocused(e) {
        return Kr.isIsolateType(e, Xr)
    }
}

function zs(t) {
    return ai(be.ONLY, ci(t))
}

function Vs(t) {
    return ai(be.SKIP, ci(t))
}

function ci(t) {
    return t === !1 ? [] : t
}

function er(t, e) {
    var n, r;
    return vr(t == null ? void 0 : t.data.match) && (!e || (r = (n = t == null ? void 0 : t.data.match) === null || n === void 0 ? void 0 : n.includes(e)) === null || r === void 0 || r)
}

function li(t, e) {
    return rn(Ht.findClosest(t, n => !!Fe.isIsolateFocused(n) && Fe.isOnlyFocused(n, e)))
}

function Ys(t) {
    const {fieldName: e} = a.getData(t);
    if (wn()) return !0;
    const n = vn(), r = function (i) {
        return Ht.findClosest(i, s => {
            var o;
            if (!Fe.isIsolateFocused(s)) return !1;
            const {fieldName: u} = a.getData(i);
            return ((o = s.data.match) === null || o === void 0 ? void 0 : o.includes(u)) || s.data.matchAll
        })
    }(t);
    return Fe.isSkipFocused(r) ? !0 : !Fe.isOnlyFocused(r) && !!li(t) && !U(n[e], t)
}

function di(t, e = t) {
    const n = a.getData(t);
    return Ms(n) ? (r = t, a.skip(r), r) : (i = n.fieldName, ui() || ke(i) ? function (s) {
        return a.omit(s), s
    }(t) : Ys(t) ? function (s) {
        return a.skip(s, wn()), s
    }(e) : t);
    var r, i
}

class Js extends class {
    static match(e, n) {
        return !1
    }

    static reconcile(e, n) {
        return e ?? n
    }
} {
    static match(e, n) {
        return a.is(e) && a.is(n)
    }

    static reconcile(e, n) {
        const r = function (i, s) {
            const o = function (u, c) {
                return Dt.usesKey(u) ? a.cast(yn.handleIsolateNodeWithKey(u)) : yn.dropNextNodesOnReorder(Zs, u, c) ? (function (d, h) {
                    Dt.canReorder(d) || Tn(ye(Nt.TESTS_CALLED_IN_DIFFERENT_ORDER, {
                        fieldName: a.getData(d).fieldName,
                        prevName: a.is(h) ? a.getData(h).fieldName : void 0
                    }))
                }(u, c), u) : !a.is(c) || a.isOmitted(c) ? u : c
            }(s, i);
            return di(s, o)
        }(n, e);
        return function (i, s, o) {
            i === s && a.is(s) && (c = s) !== (u = o) && ti(u, c) && a.isPending(u) && a.cancel(u);
            var u, c
        }(r, e, n), r
    }
}

function Zs(t, e) {
    return a.is(e) && !ti(e, t)
}

function Qs(t, e) {
    var n, r;
    return (r = (n = [Js].find(i => i.match(t, e))) === null || n === void 0 ? void 0 : n.reconcile(t, e)) !== null && r !== void 0 ? r : null
}

function to(...t) {
    const [e, n] = t.reverse();
    return Ae.create(ws, () => pt.run(Object.assign({}, n && {groupName: n}), e))
}

function eo(t) {
    return nt(rt(t)), vn()[t] = !0, {
        when: function (e) {
            nt(e !== t, Nt.INCLUDE_SELF), vn()[t] = function (n) {
                return rt(e) ? li(n, e) : U(e, U(se))
            }
        }
    }
}

function no(t, e, n) {
    const r = Object.assign(Object.assign({}, {severity: Ue.Error, status: Zr.initial()}), {
        fieldName: e.fieldName,
        testFn: e.testFn
    });
    return e.groupName && (r.groupName = e.groupName), e.message && (r.message = e.message), Ae.create(zr, t, r, n ?? null)
}

function ro(t) {
    if (di(t), a.isUntested(t)) return function (e) {
        const n = function (r) {
            return pt.run({currentTest: r}, () => {
                let i;
                const {message: s, testFn: o} = a.getData(r);
                try {
                    i = o({signal: r.abortController.signal})
                } catch (u) {
                    (function (c, d) {
                        return nn(c) && rt(d)
                    })(s, u) && (a.getData(r).message = u), i = !1
                }
                return i === !1 && a.fail(r), i
            })
        }(e);
        try {
            if (He(n)) return a.getData(e).asyncTest = n, function (r) {
                const {asyncTest: i, message: s} = a.getData(r);
                if (!He(i)) return;
                const o = $.persist(() => {
                    nr(r)
                }), u = $.persist(c => {
                    a.isCanceled(r) || (a.getData(r).message = rt(c) ? c : s, a.fail(r), o())
                });
                return i.then(o, u)
            }(e);
            nr(e)
        } catch (r) {
            throw new Error(ye(Nt.UNEXPECTED_TEST_REGISTRATION_ERROR, {testObject: JSON.stringify(e), error: r}))
        }
    }(t);
    a.isNonActionable(t) || Tn(ye(Nt.UNEXPECTED_TEST_REGISTRATION_ERROR, {testObject: JSON.stringify(t)}))
}

function nr(t) {
    a.pass(t)
}

function rr(t, ...e) {
    const [n, r, i] = Ee(e[1]) ? e : [void 0, ...e];
    (function (o, u) {
        const c = "test";
        nt(rt(o), ye(Nt.INVALID_PARAM_PASSED_TO_FUNCTION, {
            fn_name: c,
            param: "fieldName",
            expected: "string"
        })), nt(Ee(u), ye(Nt.INVALID_PARAM_PASSED_TO_FUNCTION, {fn_name: c, param: "callback", expected: "function"}))
    })(t, r);
    const s = {fieldName: t, groupName: pt.useX().groupName, message: n, testFn: r};
    return qt.useEmit(q.TEST_RUN_STARTED), no(ro, s, i)
}

const tt = ot(rr, {
    memo: function (t) {
        return function (e, ...n) {
            const [r, i, s] = n.reverse();
            return function (o, u) {
                const c = pt.useX().testMemoCache, d = c.get(o);
                if (en(d)) return c(o, u);
                const [, h] = d;
                return a.isCanceled(h) ? (c.invalidate(o), c(o, u)) : ($.addNodeToHistory(h), h)
            }([Dn(), e, $.useCurrentCursor()].concat(r), function () {
                return t(e, s, i)
            })
        }
    }(rr)
});

function io() {
    return {group: to, include: eo, omitWhen: Hs, only: zs, optional: $s, skip: Vs, skipWhen: Xs, test: tt}
}

function fi() {
    return Object.freeze(ot({done: $.persist(so)}, se()))
}

function so(...t) {
    const [e, n] = t.reverse(), r = fi();
    if (function (s, o, u) {
        var c, d;
        return !!(!Ee(s) || o && Se((d = (c = u.tests[o]) === null || c === void 0 ? void 0 : c.testCount) !== null && d !== void 0 ? d : 0, 0))
    }(e, n, r)) return r;
    const i = () => e(se());
    return kt.hasRemainingWithTestNameMatching(n) ? (function (s, o) {
        const [, u] = In(), [, c] = On();
        o ? u(d => ot(d, {[o]: (d[o] || []).concat(s)})) : c(d => d.concat(s))
    }(i, n), r) : (i(), r)
}

function mi(...t) {
    const [e, n] = t.reverse();
    (function (s) {
        nt(Ee(s), Nt.SUITE_MUST_BE_INITIALIZED_WITH_FUNCTION)
    })(e);
    const r = function ({suiteName: s, VestReconciler: o}) {
        const u = {
            doneCallbacks: Xe.createTinyState(() => []),
            fieldCallbacks: Xe.createTinyState(() => ({})),
            suiteId: ts(),
            suiteName: s,
            suiteResultCache: ks
        };
        return $.createRef(o, u)
    }({suiteName: n, VestReconciler: Qs});

    function i(...s) {
        return pt.run({suiteParams: s}, () => {
            return qt.useEmit(q.SUITE_RUN_STARTED), o = function (u, ...c) {
                const d = qt.useEmit();
                return () => (u(...c), d(q.SUITE_CALLBACK_RUN_FINISHED), fi())
            }(e, ...s), Ae.create(Ps, o, {optional: {}});
            var o
        }).output
    }

    return $.Run(r, () => {
        const s = Ws();
        return ot($.persist(i), Object.assign(Object.assign({
            dump: $.persist(() => $.useAvailableRoot()),
            get: $.persist(se),
            remove: qt.usePrepareEmitter(q.REMOVE_FIELD),
            reset: qt.usePrepareEmitter(q.RESET_SUITE),
            resetField: qt.usePrepareEmitter(q.RESET_FIELD),
            resume: $.persist(Us),
            subscribe: s.subscribe
        }, (o = $.persist(se), {
            getError: (...u) => o().getError(...u),
            getErrors: (...u) => o().getErrors(...u),
            getErrorsByGroup: (...u) => o().getErrorsByGroup(...u),
            getWarning: (...u) => o().getWarning(...u),
            getWarnings: (...u) => o().getWarnings(...u),
            getWarningsByGroup: (...u) => o().getWarningsByGroup(...u),
            hasErrors: (...u) => o().hasErrors(...u),
            hasErrorsByGroup: (...u) => o().hasErrorsByGroup(...u),
            hasWarnings: (...u) => o().hasWarnings(...u),
            hasWarningsByGroup: (...u) => o().hasWarningsByGroup(...u),
            isPending: (...u) => o().isPending(...u),
            isTested: (...u) => o().isTested(...u),
            isValid: (...u) => o().isValid(...u),
            isValidByGroup: (...u) => o().isValidByGroup(...u)
        })), io()));
        var o
    })
}

Nt.WARN_MUST_BE_CALLED_FROM_TEST;

function Ei(t) {
    let e = {};
    for (const [n, r] of Object.entries(t)) e = w(e, n, r);
    return e
}

function oo(t) {
    return async function (n) {
        return new Promise(r => {
            t(n).done(i => {
                i.hasErrors() ? r(Ei(i.getErrors())) : r(void 0)
            })
        })
    }
}

function uo(t) {
    return async function (n) {
        const r = t(n);
        if (r.hasWarnings()) return Ei(r.getWarnings())
    }
}

function hi({suite: t}) {
    return function (n) {
        if (n.stage !== "SETUP") return {};
        const r = oo(t), i = uo(t);
        return n.addValidator(r), n.addValidator(i, {level: "warning"}), {}
    }
}

function bn(t) {
    return bn = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function (e) {
        return typeof e
    } : function (e) {
        return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
    }, bn(t)
}

function Je(t) {
    if (!(typeof t == "string" || t instanceof String)) {
        var e = bn(t);
        throw t === null ? e = "null" : e === "object" && (e = t.constructor.name), new TypeError("Expected a string but received a ".concat(e))
    }
}

function ir() {
    var t = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {},
        e = arguments.length > 1 ? arguments[1] : void 0;
    for (var n in e) t[n] === void 0 && (t[n] = e[n]);
    return t
}

function Sn(t) {
    return Sn = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function (e) {
        return typeof e
    } : function (e) {
        return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
    }, Sn(t)
}

function ln(t, e) {
    var n, r;
    Je(t), Sn(e) === "object" ? (n = e.min || 0, r = e.max) : (n = arguments[1], r = arguments[2]);
    var i = encodeURI(t).split(/%..|./).length - 1;
    return i >= n && (r === void 0 || i <= r)
}

var ao = {
        require_tld: !0,
        allow_underscores: !1,
        allow_trailing_dot: !1,
        allow_numeric_tld: !1,
        allow_wildcard: !1,
        ignore_max_length: !1
    }, sr = "(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])", Kt = "(".concat(sr, "[.]){3}").concat(sr),
    co = new RegExp("^".concat(Kt, "$")), K = "(?:[0-9a-fA-F]{1,4})",
    lo = new RegExp("^(" + "(?:".concat(K, ":){7}(?:").concat(K, "|:)|") + "(?:".concat(K, ":){6}(?:").concat(Kt, "|:").concat(K, "|:)|") + "(?:".concat(K, ":){5}(?::").concat(Kt, "|(:").concat(K, "){1,2}|:)|") + "(?:".concat(K, ":){4}(?:(:").concat(K, "){0,1}:").concat(Kt, "|(:").concat(K, "){1,3}|:)|") + "(?:".concat(K, ":){3}(?:(:").concat(K, "){0,2}:").concat(Kt, "|(:").concat(K, "){1,4}|:)|") + "(?:".concat(K, ":){2}(?:(:").concat(K, "){0,3}:").concat(Kt, "|(:").concat(K, "){1,5}|:)|") + "(?:".concat(K, ":){1}(?:(:").concat(K, "){0,4}:").concat(Kt, "|(:").concat(K, "){1,6}|:)|") + "(?::((?::".concat(K, "){0,5}:").concat(Kt, "|(?::").concat(K, "){1,7}|:))") + ")(%[0-9a-zA-Z-.:]{1,})?$");

function Ze(t) {
    var e = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : "";
    return Je(t), (e = String(e)) ? e === "4" ? co.test(t) : e === "6" && lo.test(t) : Ze(t, 4) || Ze(t, 6)
}

var fo = {
        allow_display_name: !1,
        require_display_name: !1,
        allow_utf8_local_part: !0,
        require_tld: !0,
        blacklisted_chars: "",
        ignore_max_length: !1,
        host_blacklist: [],
        host_whitelist: []
    }, mo = /^([^\x00-\x1F\x7F-\x9F\cX]+)</i, Eo = /^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~]+$/i, ho = /^[a-z\d]+$/,
    po = /^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f]))*$/i,
    yo = /^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+$/i,
    vo = /^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*$/i;
X.extend({
    isEmail: function (t, e) {
        if (Je(t), (e = ir(e, fo)).require_display_name || e.allow_display_name) {
            var n = t.match(mo);
            if (n) {
                var r = n[1];
                if (t = t.replace(r, "").replace(/(^<|>$)/g, ""), r.endsWith(" ") && (r = r.slice(0, -1)), !function (m) {
                    var y = m.replace(/^"(.+)"$/, "$1");
                    return !(!y.trim() || /[\.";<>]/.test(y) && (y === m || y.split('"').length !== y.split('\\"').length))
                }(r)) return !1
            } else if (e.require_display_name) return !1
        }
        if (!e.ignore_max_length && t.length > 254) return !1;
        var i = t.split("@"), s = i.pop(), o = s.toLowerCase();
        if (e.host_blacklist.includes(o) || e.host_whitelist.length > 0 && !e.host_whitelist.includes(o)) return !1;
        var u = i.join("@");
        if (e.domain_specific_validation && (o === "gmail.com" || o === "googlemail.com")) {
            var c = (u = u.toLowerCase()).split("+")[0];
            if (!ln(c.replace(/\./g, ""), {min: 6, max: 30})) return !1;
            for (var d = c.split("."), h = 0; h < d.length; h++) if (!ho.test(d[h])) return !1
        }
        if (!(e.ignore_max_length !== !1 || ln(u, {max: 64}) && ln(s, {max: 254}))) return !1;
        if (!function (m, y) {
            Je(m), (y = ir(y, ao)).allow_trailing_dot && m[m.length - 1] === "." && (m = m.substring(0, m.length - 1)), y.allow_wildcard === !0 && m.indexOf("*.") === 0 && (m = m.substring(2));
            var v = m.split("."), F = v[v.length - 1];
            return y.require_tld && (v.length < 2 || !y.allow_numeric_tld && !/^([a-z\u00A1-\u00A8\u00AA-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]{2,}|xn[a-z0-9-]{2,})$/i.test(F) || /\s/.test(F)) ? !1 : !(!y.allow_numeric_tld && /^\d+$/.test(F)) && v.every(function (W) {
                return !(W.length > 63 && !y.ignore_max_length || !/^[a-z_\u00a1-\uffff0-9-]+$/i.test(W) || /[\uff01-\uff5e]/.test(W) || /^-|-$/.test(W) || !y.allow_underscores && /_/.test(W))
            })
        }(s, {require_tld: e.require_tld, ignore_max_length: e.ignore_max_length})) {
            if (!e.allow_ip_domain) return !1;
            if (!Ze(s)) {
                if (!s.startsWith("[") || !s.endsWith("]")) return !1;
                var p = s.slice(1, -1);
                if (p.length === 0 || !Ze(p)) return !1
            }
        }
        if (u[0] === '"') return u = u.slice(1, u.length - 1), e.allow_utf8_local_part ? vo.test(u) : po.test(u);
        for (var b = e.allow_utf8_local_part ? yo : Eo, D = u.split("."), A = 0; A < D.length; A++) if (!b.test(D[A])) return !1;
        return !e.blacklisted_chars || u.search(new RegExp("[".concat(e.blacklisted_chars, "]+"), "g")) === -1
    }
});
const pi = window.siteUrl;
document.addEventListener("DOMContentLoaded", () => {
    AutoInit(document.body);

    function t() {
        document.querySelectorAll(".select-field").forEach(n => {
            const r = n.querySelector('input[type="text"]');
            n.querySelector("select").getAttribute("aria-invalid") === "true" && r.setAttribute("aria-invalid", "true")
        })
    }

    t()
});
const go = mi("registerFormValidator", t => {
    tt("Name", "Enter user name", () => {
        X(t.Name).isNotEmpty().condition(e => /^[\p{Letter}\p{Mark}\s]+$/u.test(e))
    }), tt("Email", "Enter email", () => {
        X(t.Email).isNotEmpty().isEmail()
    }), tt("Password", "Enter password", () => {
        const e = t.Password, n = t.ConfirmPassword, r = e.length >= 8, i = /[A-Z]/.test(e);
        if (!r) throw new Error("Пароль повинен містити не менше 8 символів.");
        if (!i) throw new Error("Пароль повинен містити хоча б одну велику літеру.");
        X(e).equals(n)
    }), tt("ConfirmPassword", "Enter password", () => {
        X(t.ConfirmPassword).isNotEmpty().equals(t.Password)
    }), tt("MessengerType", "Enter contact method", () => {
        X(t.MessengerType).isNotEmpty()
    }), tt("Messenger", "Enter contact ", () => {
        X(t.Messenger).isNotEmpty()
    }), tt("HowDidYouKnow", "Enter traffic sources", () => {
        X(t.HowDidYouKnow).isNotEmpty()
    }), tt("TrafficSources", "Enter traffic sources", () => {
        X(t.TrafficSources).isNotEmpty()
    }), tt("TermsConditions", "I accept the terms and conditions ", () => {
        X(t.TermsConditions).isTruthy()
    }), tt("PrivacyPolicy", "i agree with private polisy", () => {
        X(t.PrivacyPolicy).isTruthy()
    })
});

function yi(t, e, n) {
    const r = JSON.parse(localStorage.getItem("AD_params") || "{}"), i = localStorage.getItem("LandingPageUrl");
    return i && (n.LandingPageUrl = i), Object.assign(n, r), console.log(n), new Promise(function (s, o) {
        var u = new XMLHttpRequest;
        u.open(e, t, !0), u.setRequestHeader("Content-Type", "application/json"), u.withCredentials = !0, u.onreadystatechange = function () {
            if (u.readyState === 4) if (u.status === 200) {
                var c = JSON.parse(u.responseText);
                c.errors && c.errors.length > 0 ? (o(c), openModal("error", c.errors[0]), console.log(c.errors[0])) : (openModal("Congratulations!", "You sign up for an affiliate network Affstream   Confirm your email and let's get started."), localStorage.clear()), s(c)
            } else o({status: u.statusText})
        }, u.send(JSON.stringify(n))
    })
}

fr("register-form", {
    extend: hi({suite: go}), onSubmit: function (t) {
        yi("https://" + pi + "/api/account/register/affiliate", "POST", t).then(function (e) {
            console.log("Запит успішно відправлено:", e)
        }).catch(function (e) {
            console.error("Помилка відправки запиту:", e.message)
        })
    }
}).then(function (t) {
    console.log(t)
});
const No = mi("advertiserFormValidator", t => {
    tt("Name", "Enter name", () => {
        X(t.Name).isNotEmpty()
    }), tt("CompanyName", "Enter Company Name", () => {
        X(t.CompanyName).isNotEmpty()
    }), tt("Email", "Enter Email", () => {
        X(t.Email).isEmail()
    }), tt("JobTitle", "Enter JobTitle", () => {
        X(t.JobTitle).isNotEmpty()
    }), tt("Message", "Enter Message", () => {
        X(t.Message).isNotEmpty()
    }), tt("AgreeToReceiveCommunication", "Enter name", () => {
        X(t.AgreeToReceiveCommunication).isTruthy()
    })
});
fr("advertiser-form-validator", {
    extend: hi({suite: No}), onSubmit: t => {
        console.log(t), yi("https://" + pi + "/api/account/register/advertiser", "POST", t).then(function (e) {
            openModal("Congratulations!", "You sign up for an affiliate network Affstream n/Confirm your email and let's get started."), console.log("Запит успішно відправлено:", e)
        }).catch(function (e) {
            openModal(e.message, "errors"), console.error("Помилка відправки запиту:", e.message)
        })
    }
}).then(t => {
    console.log(t)
});
